<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use App\Models\Project;
use App\Models\ProjectCategory;
use App\TranslationSetting as TranslationSetting;

class ProjectCategoriesController extends Controller
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
        $this->fields = TranslationSetting::get(with(new ProjectCategory)->getTable());

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
        $categories = ProjectCategory::all();

        return view('backend.project_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('backend.project_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['status' => intval($request->status)]);

        $validation = Validator::make($data = $request->only(['status', 'name']), ProjectCategory::rules());
        $validation->setAttributeNames(trans('projects.categories'));

        if (!$validation->passes()) {
            return back()->withErrors($validation)->withInput();
        }

        
        $category = ProjectCategory::create($data);

        if ($this->languages && $this->fields) {
            foreach ($this->fields as $field) {
                $category->translation($field, $this->language)->create(['locale' => $this->language, 'name' => $field, 'content' => $request->$field]);
                foreach ($this->languages as $k => $v) {
                    $content = $field . '_' .  $k;
                    $category->translation($field, $k)->create(['locale' => $k, 'name' => $field, 'content' => $request->$content]);
                }
            }
        }

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'success');

        return redirect()->route('admin.project-categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = intval($id);
        $category   = ProjectCategory::find($id);

        return view('backend.project_categories.edit', compact('category'));
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
        $id = intval($id);
        $request->merge(['status' => intval($request->status)]);

        $category = ProjectCategory::find($id);
        if(is_null($category)) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return redirect()->route('admin.project-categories.index');
        }

        $validation = Validator::make($data = $request->only(['status', 'name']), ProjectCategory::rules());
        $validation->setAttributeNames(trans('projects.categories'));

        if (!$validation->passes()) {
            return back()->withErrors($validation)->withInput();
        }

        $category->update($data);

        if ($this->languages && $this->fields) {
            foreach ($this->fields as $field) {
                $tmp = $category->translation($field, $this->language)->first();
                if (is_null($tmp))
                    $category->translation($field, $this->language)->create(['locale' => $this->language, 'name' => $field, 'content' => $request->$field]);
                else
                    $category->translation($field, $this->language)->update(['content' => $request->$field]);

                foreach ($this->languages as $k => $v) {
                    $content = $field . '_' .  $k;
                    $tmp = $category->translation($field, $k)->first();
                    if (is_null($tmp))
                        $category->translation($field, $k)->create(['locale' => $k, 'name' => $field, 'content' => $request->$content]);
                    else
                        $category->translation($field, $k)->update(['content' => $request->$content]);
                }
            }
        }

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'success');

        return redirect()->route('admin.project-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $id = intval($id);
        $category = ProjectCategory::find($id);

        if ($category == null) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return redirect()->route('admin.project-categories.index');
        }

        if(Project::where('category_id', $id)->count()) {
            Session::flash('message', "Danh mục đã tồn tại bài viết.");
            Session::flash('alert-class', 'danger');
            return redirect()->route('admin.project-categories.index');
        }

        $category->delete();

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'success');
        return redirect()->route('admin.project-categories.index');
    }
}
