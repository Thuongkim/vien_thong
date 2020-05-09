<?php namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\News as News;
use App\Define\Constant as Constant;
use App\NewsCategory as NewsCategory;
use App\TranslationSetting as TranslationSetting;

use App\Http\Controllers\Controller;

class NewsCategoriesController extends Controller
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
        $this->fields = TranslationSetting::get(with(new NewsCategory)->getTable());

        \View::share('languages', $this->languages);
        \View::share('fields', $this->fields);
    }

    public function index(Request $request)
    {
        $categories = NewsCategory::where('parent_id', 0)->get();

        for ($i=0; $i < $categories->count(); $i++) {
            $categories[$i]->children = NewsCategory::where('parent_id', $categories[$i]->id)->get();
        }

        return view('backend.news_categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = NewsCategory::where('parent_id', 0)->where('status', 1)->pluck("name", 'id')->all();

        return view('backend.news_categories.create', compact('categories'));
    }

    public function show(Request $request, $id)
    {
        return redirect()->route('admin.news-categories.index');
    }

    public function edit(Request $request, $id)
    {
        $id = intval($id);
        $category   = NewsCategory::find($id);
        if(is_null($category)) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return redirect()->route('admin.news_categories.index');
        }

        $categories = NewsCategory::where('parent_id', 0)->where('id', '<>', $id)->where('status', 1)->pluck("name", 'id')->all();

        return view('backend.news_categories.edit', compact('categories', 'category'));
    }

    public function store(Request $request)
    {
        $request->merge(['status' => intval($request->status)]);

        $validation = Validator::make($data = $request->only(['parent', 'status', 'name']), NewsCategory::rules());
        $validation->setAttributeNames(trans('news.categories'));

        if (!$validation->passes()) {
            return back()->withErrors($validation)->withInput();
        }

        $data['parent_id'] = intval($data['parent']);
        $category = NewsCategory::create($data);

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

        return redirect()->route('admin.news-categories.index');
    }

    public function update(Request $request, $id)
    {
        $id = intval($id);
        $request->merge(['status' => intval($request->status)]);

        $category = NewsCategory::find($id);
        if(is_null($category)) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return redirect()->route('admin.news_categories.index');
        }

        $validation = Validator::make($data = $request->only(['parent', 'status', 'name']), NewsCategory::rules());
        $validation->setAttributeNames(trans('news.categories'));

        if (!$validation->passes()) {
            return back()->withErrors($validation)->withInput();
        }

        $data['parent_id'] = intval($data['parent']);

        if ($category->id == Constant::news_category_id) {
            $category->status = $request->status;
            $category->save();
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

        Session::flash('message', trans("Danh mục cố định, không thể sửa tên tiếng việt."));
        Session::flash('alert-class', 'success');

        return redirect()->route('admin.news-categories.index');
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

        return redirect()->route('admin.news-categories.index');
    }

    public function delete(Request $request, $id)
    {
        $id = intval($id);
        $category = NewsCategory::find($id);

        if ($category == null) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return redirect()->route('admin.news-categories.index');
        }

        if(NewsCategory::where('parent_id', $id)->count()) {
            Session::flash('message', "Danh mục đã tồn tại danh mục con.");
            Session::flash('alert-class', 'danger');
            return redirect()->route('admin.news-categories.index');
        }

        if(News::where('category_id', $id)->count()) {
            Session::flash('message', "Danh mục đã tồn tại bài viết.");
            Session::flash('alert-class', 'danger');
            return redirect()->route('admin.news-categories.index');
        }

        if ($category->id == Constant::news_category_id) {
            Session::flash('message', "Danh mục cố định không thể xóa.");
            Session::flash('alert-class', 'danger');
            return redirect()->route('admin.news-categories.index');
        }

        $category->delete();

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'success');
        return redirect()->route('admin.news-categories.index');
    }
}