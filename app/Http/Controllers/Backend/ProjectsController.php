<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use App\Models\Project;
use App\Models\ProjectCategory;
use App\TranslationSetting as TranslationSetting;

class ProjectsController extends Controller
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
        $this->fields = TranslationSetting::get(with(new Project)->getTable());

        \View::share('languages', $this->languages);
        \View::share('fields', $this->fields);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        if($category <> -1) $query .= " AND category_id = {$category}";

        // if ($date_range)
        //     $date_range = explode(' - ', $date_range);
        // if (isset($date_range[0]) && isset($date_range[1]))
        //     $query .= " AND created_at >= '" . date("Y-m-d 00:00:00", strtotime(str_replace('/', '-', ($date_range[0] == '' ? '1/1/2015' : $date_range[0]) ))) . "' AND updated_at <= '" . date("Y-m-d 23:59:59", strtotime(str_replace('/', '-', ($date_range[1] == '' ? date("d/m/Y") : $date_range[1]) ))) . "'";

        // if (!$request->user()->ability(['system', 'admin'], ['project.approve'])) {
        //     $query .= " AND created_by = " . $request->user()->id;
        // }

        $projects = Project::whereRaw($query . ' order by updated_at DESC')->paginate($page_num);

        $categories = [];
        $tmp = ProjectCategory::all();
        foreach ($tmp as $category) {
            $categories[$category->id] = $category->name;
        }
        return view('backend.projects.index', compact('projects', 'categories')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = [];
        $tmp = ProjectCategory::all();
        foreach ($tmp as $category) {
            $categories[$category->id] = $category->name;
        }
        return view('backend.projects.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['featured' => intval($request->featured), 'status' => intval($request->status)]);
        $validator = Validator::make($data = $request->all(), Project::rules());
        $validator->setAttributeNames(trans('projects'));

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // $data['created_by']   = \Auth::guard('admin')->user()->id;
        $data['category_id'] = $request->input('category');

        if ($request->hasFile('image')) {
            $image  = $request->image;
            $ext    = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $image  = \Image::make($request->image)->resize(279, 200);
            //resize
            if ($image->height() > $image->width()) {
                if ($image->height() >= 200) {
                    $image->resize(null, 200, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            } else {
                if ($image->width() >= 279) {
                    $image->resize(279, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            }

            \File::makeDirectory('assets/media/images/projects/' .  date('dm'), 0775, true, true);
            $image->save('assets/media/images/projects/' .  date('dm') . '/' . str_slug($data['title']) . '.' .  $ext);
            $data['image'] = date('dm') . '/' . str_slug($data['title']). '.' .  $ext;
        }

        $project = Project::create($data);

        if ($this->languages && $this->fields) {
            foreach ($this->fields as $field) {
                $project->translation($field, $this->language)->create(['locale' => $this->language, 'name' => $field, 'content' => $request->$field]);
                foreach ($this->languages as $k => $v) {
                    $content = $field . '_' .  $k;
                    $project->translation($field, $k)->create(['locale' => $k, 'name' => $field, 'content' => $request->$content]);
                }
            }
        }

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'info');

        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $project = Project::find($id);
        if ( is_null( $project ) ) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        if ($project->status && !$request->user()->ability(['system', 'admin'], ['project.approve'])) {
            Session::flash('message', "Bài viết đã xuất bản, không thể sửa.");
            Session::flash('alert-class', 'danger');
            return back();
        }

        $categories = [];
        $tmp = ProjectCategory::all();
        foreach ($tmp as $category) {
            $categories[$category->id] = $category->name;
        }

        return view('backend.projects.edit', compact( 'project', 'categories' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = intval( $id );
        $request->merge(['featured' => intval($request->featured), 'status' => intval($request->status)]);

        $project = Project::find($id);
        if (is_null($project)) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        if ($project->status && !$request->user()->ability(['system', 'admin'], ['project.approve'])) {
            Session::flash('message', "Bài viết đã xuất bản, không thể sửa.");
            Session::flash('alert-class', 'danger');
            return back();
        }

        $validator = Validator::make($data = $request->all(), Project::rules());

        $validator->setAttributeNames(trans('projects'));

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['category_id'] = $request->input('category');

        if ($request->hasFile('image')) {
            $image  = $request->image;
            $ext    = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $image  = \Image::make($request->image)->resize(279, 200);
            //resize
            if ($image->height() > $image->width()) {
                if ($image->height() >= 200) {
                    $image->resize(null, 200, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            } else {
                if ($image->width() >= 279) {
                    $image->resize(279, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            }

            \File::makeDirectory('assets/media/images/projects/' .  date('dm'), 0775, true, true);
            if(\File::exists(asset('assets/media/images/projects/' . $project->image))) \File::delete(public_path(). '/assets/media/images/projects/' . $project->image);
            $timestamp = time();
            $image->save('assets/media/images/projects/' .  date('dm') . '/' . str_slug($data['title']). "_" . $timestamp . '.' .  $ext);
            $data['image'] = date('dm') . '/' . str_slug($data['title']). "_" . $timestamp . '.' .  $ext;
        }

        $project->update($data);
        if ($this->languages && $this->fields) {
            foreach ($this->fields as $field) {
                $tmp = $project->translation($field, $this->language)->first();
                if (is_null($tmp))
                    $project->translation($field, $this->language)->create(['locale' => $this->language, 'name' => $field, 'content' => $request->$field]);
                else
                    $project->translation($field, $this->language)->update(['content' => $request->$field]);

                foreach ($this->languages as $k => $v) {
                    $content = $field . '_' .  $k;
                    $tmp = $project->translation($field, $k)->first();
                    if (is_null($tmp))
                        $project->translation($field, $k)->create(['locale' => $k, 'name' => $field, 'content' => $request->$content]);
                    else
                        $project->translation($field, $k)->update(['content' => $request->$content]);
                }
            }
        }

        // project::clearCache();

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'info');

        return redirect()->route('admin.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $project = Project::find($id);
        if (is_null($project)) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        if ($project->status && !$request->user()->ability(['system', 'admin'], ['project.approve'])) {
            Session::flash('message', "Bài viết đã xuất bản, không thể xoá.");
            Session::flash('alert-class', 'danger');
            return back();
        }

        if(\File::exists(asset('assets/media/images/projects/' . $project->image)))
            \File::delete(public_path(). '/assets/media/images/projects/' . $project->image);

        $project->delete();
        // project::clearCache();

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'success');

        return redirect()->route('admin.projects.index');
    }

    public function updateBulk(Request $request)
    {
        if ($request->ajax()) {
            $return = [ 'error' => true, 'message' => trans('system.have_an_error') ];

            if (!$request->user()->ability(['system', 'admin'], ['project.approve'])) {
                return response()->json($return, 401);
            }

            $ids = json_decode($request->input('ids'));
            if(empty($ids)) return response()->json(['error' => true, 'message' => trans('system.no_item_selected')]);

            switch ($request->input('action')) {
                case 'delete':
                    foreach ($ids as $id) {
                        foreach ($ids as $id) {
                            Project::where('id', intval($id))->delete();
                        }
                    }
                    // Project::clearCache();
                    break;
                case 'active':
                    $return = ['error' => true, 'message' => trans('system.update') . ' ' . trans('system.success')];
                    foreach ($ids as $id) {
                        Project::where('id', intval($id))->update(['status' => 1]);
                    }
                    // Project::clearCache();
                    break;
                case 'deactive':
                    $return = ['error' => true, 'message' => trans('system.update') . ' ' . trans('system.success')];
                    foreach ($ids as $id) {
                        Project::where('id', intval($id))->update(['status' => 0]);
                    }
                    // Project::clearCache();
                    break;
                case 'category':
                    $return             = ['error' => true, 'message' => trans('system.update') . ' ' . trans('system.success')];
                    $category_id        = intval($request->input('category_id', 0));
                    $category           = ProjectCategory::find($category_id);
                    if (is_null($category) || !$category->status) {
                        $return['message'] = 'Danh mục bạn chọn không cho phép thao tác này.';
                        return response()->json($return);
                    }

                    foreach ($ids as $id) {
                        Project::where('id', intval($id))->update(['category_id' => $category_id]);
                    }
                    // Project::clearCache();
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
