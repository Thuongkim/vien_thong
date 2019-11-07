<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use App\Models\Service as Service;
use App\Models\ServiceCategory as ServiceCategory;
use App\TranslationSetting as TranslationSetting;

class ServiceController extends Controller
{
    private $languages;
    private $language;
    private $fields;

    public function __construct()
    {
        $locales = config('app.locales');
        $this->language = $locales[0];
        unset($locales[0]);
        $this->languages = array_flip($locales);
        $this->fields = TranslationSetting::get(with(new Service)->getTable());

        \View::share('languages', $this->languages);
        \View::share('fields', $this->fields);
    }

    public function index(Request $request)
    {
        $query = '1=1';

        $title                  = $request->input('title');
        $status                 = intval($request->input('status', -1));
        $featured               = intval($request->input('featured', -1));
        $category               = intval($request->input('category_id', -1));
        $date_range             = $request->input('date_range');
        $page_num               = intval($request->input('page_num', \App\Define\Constant::PAGE_NUM_20));

        if( $title ) $query .= " AND title like '%" . $title . "%'";
        if($status <> -1) $query .= " AND status = {$status}";
        if($featured <> -1) $query .= " AND featured = {$featured}";
        if($category <> -1) {
            $children = ServiceCategory::where('parent_id', $category)->select('id')->get();
            $children = implode(',', array_column($children->toArray(), 'id'));
            $category = ($children ? $category . ',' . $children : $category);
            $query .= " AND category_id IN({$category})";
        }

        if ($date_range)
            $date_range = explode(' - ', $date_range);
        if (isset($date_range[0]) && isset($date_range[1]))
            $query .= " AND created_at >= '" . date("Y-m-d 00:00:00", strtotime(str_replace('/', '-', ($date_range[0] == '' ? '1/1/2015' : $date_range[0]) ))) . "' AND updated_at <= '" . date("Y-m-d 23:59:59", strtotime(str_replace('/', '-', ($date_range[1] == '' ? date("d/m/Y") : $date_range[1]) ))) . "'";

        if (!$request->user()->ability(['system', 'admin'], ['services.approve'])) {
            $query .= " AND created_by = " . $request->user()->id;
        }

        $services = Service::whereRaw($query . ' order by position')->paginate($page_num);

        $categories = [];
        $tmp = ServiceCategory::where('parent_id', 0)->get();
        foreach ($tmp as $category) {
            $categories[$category->id] = $category->name;
            $children = ServiceCategory::where('parent_id', $category->id)->get();
            foreach ($children as $child) {
                $categories[$child->id] = '-- ' . $child->name;
            }
        }

        return view('backend.services.index', compact('services', 'categories'));
    }


    public function create(Request $request)
    {
        $categories = [];
        $tmp = ServiceCategory::where('parent_id', 0)->where('status', 1)->get();
        foreach ($tmp as $category) {
            $categories[$category->id] = $category->name;
            $children = ServiceCategory::where('parent_id', $category->id)->where('status', 1)->get();
            foreach ($children as $child) {
                $categories[$child->id] = '|__ ' . $child->name;

                $grandChildren = ServiceCategory::where('parent_id', $child->id)->where('status', 1)->get();
                foreach ($grandChildren as $ch) {
                    $categories[$ch->id] = '|____ ' . $ch->name;
                }
            }
        }

        return view('backend.services.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->merge(['featured' => intval($request->featured), 'status' => intval($request->status)]);
        $validator = Validator::make($data = $request->only('category', 'title', 'image', 'content', 'summary','status', 'icon', 'featured', 'summary_long'), Service::rules());
        $validator->setAttributeNames(trans('services'));
        if ($validator->fails()) return redirect()->back()->withErrors($validator)->withInput();

        $data['created_by']   = \Auth::guard('admin')->user()->id;
        $data['category_id'] = $request->input('category');

        if ($request->hasFile('image')) {

            $image  = $request->image;
            $ext    = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $image  = \Image::make($request->image)->resize(425, 500);
            //resize
            if ($image->height() > $image->width()) {
                if ($image->height() >= 500) {
                    $image->resize(null, 500, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            } else {
                if ($image->height() >= 500) {
                    $image->resize(null, 500, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
                elseif ($image->width() >= 425) {
                    $image->resize(425, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            }

            \File::makeDirectory('assets/media/images/services/', 0775, true, true);
            $timestamp = time();
            $image->save('assets/media/images/services/' . str_slug($data['title']). "_" . $timestamp . '.' .  $ext);
            $data['image'] = 'assets/media/images/services/' . str_slug($data['title']). "_" . $timestamp . '.' .  $ext;
        }
        $data['position']   = 1;
        $sevice = Service::create($data);
        Service::where('id', "<>", $sevice->id)->increment('position');

        if ($this->languages && $this->fields) {
            foreach ($this->fields as $field) {
                $sevice->translation($field, $this->language)->create(['locale' => $this->language, 'name' => $field, 'content' => $request->$field]);
                foreach ($this->languages as $k => $v) {
                    $content = $field . '_' .  $k;
                    $sevice->translation($field, $k)->create(['locale' => $k, 'name' => $field, 'content' => $request->$content]);
                }
            }
        }

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'success');

        return redirect()->route('admin.services.index');
    }

    public function edit(Request $request, $id)
    {
        $services = Service::find($id);
        if ( is_null( $services ) ) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        if ($services->status && !$request->user()->ability(['system', 'admin'], ['services.approve'])) {
            Session::flash('message', "Bài viết đã xuất bản, không thể sửa.");
            Session::flash('alert-class', 'danger');
            return back();
        }

        $categories = [];
        $tmp = ServiceCategory::where('parent_id', 0)->whereRaw("(status=1 OR id={$services->category_id})")->get();
        foreach ($tmp as $category) {
            $categories[$category->id] = $category->name;
            $children = ServiceCategory::where('parent_id', $category->id)->whereRaw("(status=1 OR id={$services->category_id})")->get();
            foreach ($children as $child) {
                $categories[$child->id] = '-- ' . $child->name;
            }
        }

        return view('backend.services.edit', compact( 'services', 'categories' ) );
    }

    public function update(Request $request, $id)
    {
        $id = intval( $id );
        $request->merge(['featured' => intval($request->featured), 'status' => intval($request->status)]);

        $services = Service::find($id);
        if (is_null($services)) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        if ($services->status && !$request->user()->ability(['system', 'admin'], ['services.approve'])) {
            Session::flash('message', "Bài viết đã xuất bản, không thể sửa.");
            Session::flash('alert-class', 'danger');
            return back();
        }

        if ($request->hasFile('image'))
            $validator = Validator::make($data = $request->only('category', 'title', 'image', 'content', 'summary', 'status', 'icon', 'featured', 'summary_long'), Service::rules($id));
        else
            $validator = Validator::make($data = $request->only('category', 'title', 'content', 'summary', 'status', 'icon', 'featured', 'image', 'summary_long'), Service::rules($id));

        $validator->setAttributeNames(trans('services'));

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['category_id'] = $request->input('category');

        if ($request->hasFile('image')) {
            $image  = $request->image;
            $ext    = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $image  = \Image::make($request->image)->resize(425, 500);
            //resize
            if ($image->height() > $image->width()) {
                if ($image->height() >= 500) {
                    $image->resize(null, 500, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            } else {
                if ($image->height() >= 500) {
                    $image->resize(null, 500, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
                elseif ($image->width() >= 425) {
                    $image->resize(425, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            }

            \File::makeDirectory('assets/media/images/services/', 0775, true, true);
            if (\File::exists(public_path() . '/' . $services->image)) \File::delete(public_path() . '/' . $services->image);
            $timestamp = time();
            $image->save('assets/media/images/services/' . str_slug($data['title']). "_" . $timestamp . '.' .  $ext);
            $data['image'] = 'assets/media/images/services/' . str_slug($data['title']). "_" . $timestamp . '.' .  $ext;
        }

        $services->update($data);
        if ($this->languages && $this->fields) {
            foreach ($this->fields as $field) {
                $tmp = $services->translation($field, $this->language)->first();
                if (is_null($tmp))
                    $services->translation($field, $this->language)->create(['locale' => $this->language, 'name' => $field, 'content' => $request->$field]);
                else
                    $services->translation($field, $this->language)->update(['content' => $request->$field]);

                foreach ($this->languages as $k => $v) {
                    $content = $field . '_' .  $k;
                    $tmp = $services->translation($field, $k)->first();
                    if (is_null($tmp))
                        $services->translation($field, $k)->create(['locale' => $k, 'name' => $field, 'content' => $request->$content]);
                    else
                        $services->translation($field, $k)->update(['content' => $request->$content]);
                }
            }
        }

        Service::clearCache();

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'info');

        return redirect()->route('admin.services.index');
    }

    public function delete(Request $request, $id)
    {
        $services = Service::find($id);
        if (is_null($services)) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        if ($services->status && !$request->user()->ability(['system', 'admin'], ['services.approve'])) {
            Session::flash('message', "Bài viết đã xuất bản, không thể xoá.");
            Session::flash('alert-class', 'danger');
            return back();
        }

        if (\File::exists(public_path() . '/' . $services->image)) \File::delete(public_path() . '/' . $services->image);

        $services->delete();
        Service::clearCache();

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'success');

        return redirect()->route('admin.services.index');
    }

    public function updatePosition($id, $value)
    {
        if (!in_array($value, [-1, 1])) return back();

        $service = Service::find(intval($id));

        if(is_null($service)) return back();

        // tang len 1 vi tri
        if($value == 1) {
            if ($service->position == Service::count())
                return back();

            Service::where('position', $service->position + 1)->decrement('position');
            $service->position++;
            $service->save();
        } elseif($value == -1) {
            if ($service->position == 1)
                return back();

            Service::where('position', $service->position - 1)->increment('position');
            $service->position--;
            $service->save();
        }

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'success');

        return back();
    }

    public function updateBulk(Request $request)
    {
        if ($request->ajax()) {
            $return = [ 'error' => true, 'message' => trans('system.have_an_error') ];

            if (!$request->user()->ability(['system', 'admin'], ['services.approve'])) {
                return response()->json($return, 401);
            }

            $ids = json_decode($request->input('ids'));
            if(empty($ids)) return response()->json(['error' => true, 'message' => trans('system.no_item_selected')]);

            switch ($request->input('action')) {
                case 'delete':
                    foreach ($ids as $id) {
                        foreach ($ids as $id) {
                            Service::where('id', intval($id))->delete();
                        }
                    }
                    Service::clearCache();
                    break;
                case 'active':
                    $return = ['error' => true, 'message' => trans('system.update') . ' ' . trans('system.success')];
                    foreach ($ids as $id) {
                        Service::where('id', intval($id))->update(['status' => 1]);
                    }
                    Service::clearCache();
                    break;
                case 'deactive':
                    $return = ['error' => true, 'message' => trans('system.update') . ' ' . trans('system.success')];
                    foreach ($ids as $id) {
                        Service::where('id', intval($id))->update(['status' => 0]);
                    }
                    Service::clearCache();
                    break;
                case 'category':
                    $return             = ['error' => true, 'message' => trans('system.update') . ' ' . trans('system.success')];
                    $category_id        = intval($request->input('category_id', 0));
                    $category           = ServiceCategory::find($category_id);
                    if (is_null($category) || !$category->status) {
                        $return['message'] = 'Danh mục bạn chọn không cho phép thao tác này.';
                        return response()->json($return);
                    }

                    foreach ($ids as $id) {
                        Service::where('id', intval($id))->update(['category_id' => $category_id]);
                    }
                    Service::clearCache();
                    break;
                default:
                    $return['message']  = trans('system.no_action_selected');
                    return response()->json($return);
            }

            $return['error']    = false;
            $return['message']  = trans('system.success');
            Session::flash('message', $return['message']);
            Session::flash('alert-class', 'success');
            return response()->json($return);
        }
    }
    
}
