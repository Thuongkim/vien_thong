<?php namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use App\TranslationSetting as TranslationSetting;
use App\StaticPage as StaticPage;

use App\Http\Controllers\Controller;

class StaticPagesController extends Controller
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
        $this->fields = TranslationSetting::get(with(new StaticPage)->getTable());

        \View::share('languages', $this->languages);
        \View::share('fields', $this->fields);
    }

	public function index(Request $request)
	{
        $news = StaticPage::get();

		return view('backend.static-pages.index', compact('news', 'categories'));
	}

	public function show($id)
	{
        $news = StaticPage::find($id);
        if ( is_null( $news ) ) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        return view('backend.static-pages.show', compact('news'));
	}

	public function edit($id)
	{
        $news = StaticPage::find($id);
        if ( is_null( $news ) ) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

		return view('backend.static-pages.edit', compact('news'));
	}

	public function update(Request $request, $id)
	{
        $id = intval( $id );
        $request->merge(['status' => intval($request->status)]);

        $news = StaticPage::find($id);
        if ( is_null( $news ) ) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        $validator = Validator::make($data = $request->only('title', 'description', 'status'), StaticPage::rules($id));

        $validator->setAttributeNames(trans('static_pages'));

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
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

        StaticPage::clearCache();

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'info');

        return redirect()->route('admin.static-pages.index');
	}
}