<?php namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use App\Define\Constant as Constant;
use App\News as News;
use App\NewsCategory as NewsCategory;
use App\TranslationSetting as TranslationSetting;

use App\Http\Controllers\Controller;

class NewsController extends Controller
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
        $this->fields = TranslationSetting::get(with(new News)->getTable());

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
            $children = NewsCategory::where('parent_id', $category)->select('id')->get();
            $children = implode(',', array_column($children->toArray(), 'id'));
            $category = ($children ? $category . ',' . $children : $category);
            $query .= " AND category_id IN({$category})";
        }

        // if ($date_range)
        //     $date_range = explode(' - ', $date_range);
        // if (isset($date_range[0]) && isset($date_range[1]))
        //     $query .= " AND created_at >= '" . date("Y-m-d 00:00:00", strtotime(str_replace('/', '-', ($date_range[0] == '' ? '1/1/2015' : $date_range[0]) ))) . "' AND updated_at <= '" . date("Y-m-d 23:59:59", strtotime(str_replace('/', '-', ($date_range[1] == '' ? date("d/m/Y") : $date_range[1]) ))) . "'";

        if (!$request->user()->ability(['system', 'admin'], ['news.approve'])) {
            $query .= " AND created_by = " . $request->user()->id;
        }

        $news = News::whereRaw($query . ' order by updated_at DESC')->paginate($page_num);

        $categories = [];
        $tmp = NewsCategory::where('parent_id', 0)->get();
        foreach ($tmp as $category) {
            $categories[$category->id] = $category->name;
            $children = NewsCategory::where('parent_id', $category->id)->get();
            foreach ($children as $child) {
                $categories[$child->id] = '-- ' . $child->name;
            }
        }
        return view('backend.news.index', compact('news', 'categories'));
    }

    public function create()
    {
        $categories = [];
        $tmp = NewsCategory::where('parent_id', 0)->where('status', 1)->get();
        foreach ($tmp as $category) {
            $categories[$category->id] = $category->name;
            $children = NewsCategory::where('parent_id', $category->id)->where('status', 1)->get();
            foreach ($children as $child) {
                $categories[$child->id] = '-- ' . $child->name;
            }
        }
        return view('backend.news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->merge(['featured' => intval($request->featured), 'status' => intval($request->status)]);

        if ($request->category == Constant::news_category_id) {
            $validator = Validator::make($data = $request->all(), News::rules($check = false));
        }
        else {
            $validator = Validator::make($data = $request->all(), News::rules($check = true));
        }
        $validator->setAttributeNames(trans('news'));

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['created_by']   = \Auth::guard('admin')->user()->id;
        $data['category_id'] = $request->input('category');

        if ($request->hasFile('image')) {
            $image  = $request->image;
            $ext    = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $image  = \Image::make($request->image)->resize(370, 250);
            //resize
            if ($image->height() > $image->width()) {
                if ($image->height() >= 250) {
                    $image->resize(null, 250, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            } else {
                if ($image->width() >= 370) {
                    $image->resize(370, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            }

            \File::makeDirectory('assets/media/images/news/' .  date('dm'), 0775, true, true);
            $image->save('assets/media/images/news/' .  date('dm') . '/' . str_slug($data['title']) . '.' .  $ext);
            $data['image'] = date('dm') . '/' . str_slug($data['title']). '.' .  $ext;
        }

        $news = News::create($data);

        if ($this->languages && $this->fields) {
            foreach ($this->fields as $field) {
                $news->translation($field, $this->language)->create(['locale' => $this->language, 'name' => $field, 'content' => $request->$field]);
                foreach ($this->languages as $k => $v) {
                    $content = $field . '_' .  $k;
                    $news->translation($field, $k)->create(['locale' => $k, 'name' => $field, 'content' => $request->$content]);
                }
            }
        }

        News::clearCache();
        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'info');

        return redirect()->route('admin.news.index');
    }

    public function show(Request $request, $id)
    {
        $news = News::find($id);
        if ( is_null( $news ) ) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return Redirect::back();
        }

        $categories = [];
        $tmp = NewsCategory::where('parent_id', 0)->whereRaw("(status=1 OR id={$news->category_id})")->get();
        foreach ($tmp as $category) {
            $categories[$category->id] = $category->name;
            $children = NewsCategory::where('parent_id', $category->id)->whereRaw("(status=1 OR id={$news->category_id})")->get();
            foreach ($children as $child) {
                $categories[$child->id] = '-- ' . $child->name;
            }
        }

        return view('backend.news.show', ['news' => $news, 'categories' => $categories] );
    }

    public function edit(Request $request, $id)
    {
        $news = News::find($id);
        if ( is_null( $news ) ) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        if ($news->status && !$request->user()->ability(['system', 'admin'], ['news.approve'])) {
            Session::flash('message', "Bài viết đã xuất bản, không thể sửa.");
            Session::flash('alert-class', 'danger');
            return back();
        }

        $categories = [];
        $tmp = NewsCategory::where('parent_id', 0)->whereRaw("(status=1 OR id={$news->category_id})")->get();
        foreach ($tmp as $category) {
            $categories[$category->id] = $category->name;
            $children = NewsCategory::where('parent_id', $category->id)->whereRaw("(status=1 OR id={$news->category_id})")->get();
            foreach ($children as $child) {
                $categories[$child->id] = '-- ' . $child->name;
            }
        }

        return view('backend.news.edit', compact( 'news', 'categories' ) );
    }

    public function update(Request $request, $id)
    {
        $id = intval( $id );
        $request->merge(['featured' => intval($request->featured), 'status' => intval($request->status)]);

        $news = News::find($id);
        if (is_null($news)) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        if ($news->status && !$request->user()->ability(['system', 'admin'], ['news.approve'])) {
            Session::flash('message', "Bài viết đã xuất bản, không thể sửa.");
            Session::flash('alert-class', 'danger');
            return back();
        }

        // dd(Constant::news_category_id);
        if ($request->category == Constant::news_category_id) {
            $validator = Validator::make($data = $request->all(), News::rules($check = false));
        }
        else {
            $validator = Validator::make($data = $request->all(), News::rules($check = true));
        }

        $validator->setAttributeNames(trans('news'));

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['category_id'] = $request->input('category');

        if ($request->hasFile('image')) {
            $image  = $request->image;
            $ext    = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $image  = \Image::make($request->image)->resize(370, 250);
            //resize
            if ($image->height() > $image->width()) {
                if ($image->height() >= 250) {
                    $image->resize(null, 250, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            } else {
                if ($image->width() >= 370) {
                    $image->resize(370, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            }

            \File::makeDirectory('assets/media/images/news/' .  date('dm'), 0775, true, true);
            if(\File::exists(asset('assets/media/' . $news->image))) \File::delete(public_path(). '/assets/media/' . $news->image);
            $timestamp = time();
            $image->save('assets/media/images/news/' .  date('dm') . '/' . str_slug($data['title']). "_" . $timestamp . '.' .  $ext);
            $data['image'] = date('dm') . '/' . str_slug($data['title']). "_" . $timestamp . '.' .  $ext;
        }

        $news->update($data);
        if ($this->languages && $this->fields) {
            foreach ($this->fields as $field) {
                $tmp = $news->translation($field, $this->language)->first();
                if (is_null($tmp))
                    $news->translation($field, $this->language)->create(['locale' => $this->language, 'name' => $field, 'content' => $request->$field]);
                else
                    $news->translation($field, $this->language)->update(['content' => $request->$field]);

                foreach ($this->languages as $k => $v) {
                    $content = $field . '_' .  $k;
                    $tmp = $news->translation($field, $k)->first();
                    if (is_null($tmp))
                        $news->translation($field, $k)->create(['locale' => $k, 'name' => $field, 'content' => $request->$content]);
                    else
                        $news->translation($field, $k)->update(['content' => $request->$content]);
                }
            }
        }

        News::clearCache();

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'info');

        return redirect()->route('admin.news.index');
    }

    public function delete(Request $request, $id)
    {
        $news = News::find($id);
        if (is_null($news)) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        if ($news->status && !$request->user()->ability(['system', 'admin'], ['news.approve'])) {
            Session::flash('message', "Bài viết đã xuất bản, không thể xoá.");
            Session::flash('alert-class', 'danger');
            return back();
        }

        if(\File::exists(asset('assets/media/images/news/' . $news->image)))
            \File::delete(public_path(). '/assets/media/images/news/' . $news->image);

        $news->delete();
        News::clearCache();

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'success');

        return redirect()->route('admin.news.index');
    }

    public function updateBulk(Request $request)
    {
        if ($request->ajax()) {
            $return = [ 'error' => true, 'message' => trans('system.have_an_error') ];

            if (!$request->user()->ability(['system', 'admin'], ['news.approve'])) {
                return response()->json($return, 401);
            }

            $ids = json_decode($request->input('ids'));
            if(empty($ids)) return response()->json(['error' => true, 'message' => trans('system.no_item_selected')]);

            switch ($request->input('action')) {
                case 'delete':
                    foreach ($ids as $id) {
                        foreach ($ids as $id) {
                            News::where('id', intval($id))->delete();
                        }
                    }
                    News::clearCache();
                    break;
                case 'active':
                    $return = ['error' => true, 'message' => trans('system.update') . ' ' . trans('system.success')];
                    foreach ($ids as $id) {
                        News::where('id', intval($id))->update(['status' => 1]);
                    }
                    News::clearCache();
                    break;
                case 'deactive':
                    $return = ['error' => true, 'message' => trans('system.update') . ' ' . trans('system.success')];
                    foreach ($ids as $id) {
                        News::where('id', intval($id))->update(['status' => 0]);
                    }
                    News::clearCache();
                    break;
                case 'category':
                    $return             = ['error' => true, 'message' => trans('system.update') . ' ' . trans('system.success')];
                    $category_id        = intval($request->input('category_id', 0));
                    $category           = NewsCategory::find($category_id);
                    if (is_null($category) || !$category->status) {
                        $return['message'] = 'Danh mục bạn chọn không cho phép thao tác này.';
                        return response()->json($return);
                    }

                    foreach ($ids as $id) {
                        News::where('id', intval($id))->update(['category_id' => $category_id]);
                    }
                    News::clearCache();
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