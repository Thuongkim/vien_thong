<?php namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use App\Slider as Slider;
use App\TranslationSetting as TranslationSetting;

use App\Http\Controllers\Controller;

class SlidersController extends Controller
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
        $this->fields = TranslationSetting::get(with(new Slider)->getTable());

        \View::share('languages', $this->languages);
        \View::share('fields', $this->fields);
    }

	public function index(Request $request)
	{
        $sliders = Slider::orderBy('updated_at', 'DESC')->get();
		return view('backend.sliders.index', compact('sliders'));
	}

	public function create()
	{
		return view('backend.sliders.create');
	}

	public function store(Request $request)
	{
        $request->merge(['status' => intval($request->status)]);

        $validator = Validator::make($data = $request->only('name', 'summary', 'status'), Slider::rules());
		$validator->setAttributeNames(trans('sliders'));

		if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();

        $slider = Slider::create($data);
        if ($this->languages && $this->fields) {
            foreach ($this->fields as $field) {
                $slider->translation($field, $this->language)->create(['locale' => $this->language, 'name' => $field, 'content' => $request->$field]);
                foreach ($this->languages as $k => $v) {
                    $content = $field . '_' .  $k;
                    $slider->translation($field, $k)->create(['locale' => $k, 'name' => $field, 'content' => $request->$content]);
                }
            }
        }

        Slider::clearCache();

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'info');

        return redirect()->route('admin.sliders.index');
	}

	public function edit($id)
	{
        $slider = Slider::find($id);
        if ( is_null( $slider ) ) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

		return view('backend.sliders.edit', compact( 'slider' ) );
	}

	public function update(Request $request, $id)
	{
        $id = intval( $id );
        $request->merge(['status' => intval($request->status)]);

        $slider = Slider::find($id);
        if ( is_null( $slider ) ) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        $validator = Validator::make($data = $request->only('name', 'summary', 'status'), Slider::rules($id));

        $validator->setAttributeNames(trans('sliders'));

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $slider->update($data);
        if ($this->languages && $this->fields) {
            foreach ($this->fields as $field) {
                $tmp = $slider->translation($field, $this->language)->first();
                if (is_null($tmp))
                    $slider->translation($field, $this->language)->create(['locale' => $this->language, 'name' => $field, 'content' => $request->$field]);
                else
                    $slider->translation($field, $this->language)->update(['content' => $request->$field]);

                foreach ($this->languages as $k => $v) {
                    $content = $field . '_' .  $k;
                    $tmp = $slider->translation($field, $k)->first();
                    if (is_null($tmp))
                        $slider->translation($field, $k)->create(['locale' => $k, 'name' => $field, 'content' => $request->$content]);
                    else
                        $slider->translation($field, $k)->update(['content' => $request->$content]);
                }
            }
        }

        Slider::clearCache();

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'info');

        return redirect()->route('admin.sliders.index');
	}

	public function destroy($id)
	{
        $slider = Slider::find($id);
        if ( is_null( $slider ) ) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        $slider->delete();
        Slider::clearCache();

		Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'success');

		return redirect()->route('admin.sliders.index');
	}
}