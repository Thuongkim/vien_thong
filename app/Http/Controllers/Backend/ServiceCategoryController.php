<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use App\Models\ServiceCategory as ServiceCategory;
use App\Models\Service as Service;
use App\TranslationSetting as TranslationSetting;

class ServiceCategoryController extends Controller
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
        $this->fields = TranslationSetting::get(with(new ServiceCategory)->getTable());

        \View::share('languages', $this->languages);
        \View::share('fields', $this->fields);
    }

    public function index(Request $request)
    {
        $categories = ServiceCategory::where('parent_id', 0)->get();

        for ($i=0; $i < $categories->count(); $i++) {
            $categories[$i]->children = ServiceCategory::where('parent_id', $categories[$i]->id)->get();
        }

        return view('backend.services_categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = ServiceCategory::where('parent_id', 0)->where('status', 1)->pluck("name", 'id')->all();

        return view('backend.services_categories.create', compact('categories'));
    }

    public function show(Request $request, $id)
    {
        return redirect()->route('admin.service-categories.index');
    }

    public function edit(Request $request, $id)
    {
        $id = intval($id);
        $category   = ServiceCategory::find($id);
        if(is_null($category)) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return redirect()->route('admin.service_categories.index');
        }

        $categories = ServiceCategory::where('parent_id', 0)->where('id', '<>', $id)->where('status', 1)->pluck("name", 'id')->all();

        return view('backend.services_categories.edit', compact('categories', 'category'));
    }

    public function store(Request $request)
    {
        $request->merge(['status' => intval($request->status)]);

        $validation = Validator::make($data = $request->only(['parent', 'status', 'name']), ServiceCategory::rules());
        $validation->setAttributeNames(trans('services.categories'));

        if (!$validation->passes()) {
            return back()->withErrors($validation)->withInput();
        }

        $data['parent_id'] = intval($data['parent']);
        $category = ServiceCategory::create($data);

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

        return redirect()->route('admin.service-categories.index');
    }

    public function update(Request $request, $id)
    {
        $id = intval($id);
        $request->merge(['status' => intval($request->status)]);

        $category = ServiceCategory::find($id);
        if(is_null($category)) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return redirect()->route('admin.service_categories.index');
        }

        $validation = Validator::make($data = $request->only(['parent', 'status', 'name']), ServiceCategory::rules());
        $validation->setAttributeNames(trans('services.categories'));

        if (!$validation->passes()) {
            return back()->withErrors($validation)->withInput();
        }

        $data['parent_id'] = intval($data['parent']);
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

        return redirect()->route('admin.service-categories.index');
    }

    public function delete(Request $request, $id)
    {
        $id = intval($id);
        $category = ServiceCategory::find($id);

        if ($category == null) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return redirect()->route('admin.service-categories.index');
        }

        if(ServiceCategory::where('parent_id', $id)->count()) {
            Session::flash('message', "Danh mục đã tồn tại danh mục con.");
            Session::flash('alert-class', 'danger');
            return redirect()->route('admin.service-categories.index');
        }

        if(Service::where('category_id', $id)->count()) {
            Session::flash('message', "Danh mục đã tồn tại bài viết.");
            Session::flash('alert-class', 'danger');
            return redirect()->route('admin.service-categories.index');
        }

        $category->delete();

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'success');
        return redirect()->route('admin.service-categories.index');
    }
}
