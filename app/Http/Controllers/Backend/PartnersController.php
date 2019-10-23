<?php

namespace App\Http\Controllers\Backend;

use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::orderBy('updated_at', 'DESC')->get();
        return view('backend.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.partners.create');
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
        $validator = Validator::make($data = $request->all(), Partner::rules());
        $validator->setAttributeNames(trans('partners'));

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image')) {
            $image  = $request->image;
            $ext    = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $image  = \Image::make($request->image)->resize(200, 50);
            //resize
            if ($image->height() > $image->width()) {
                if ($image->height() >= 50) {
                    $image->resize(null, 50, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            } else {
                if ($image->height() >= 50) {
                    $image->resize(null, 50, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
                elseif ($image->width() >= 200) {
                    $image->resize(200, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            }

            \File::makeDirectory('assets/media/images/partners/' .  date('dm'), 0775, true, true);
            $image->save('assets/media/images/partners/' .  date('dm') . '/' . str_slug($data['name']) . '.' .  $ext);
            $data['image'] = date('dm') . '/' . str_slug($data['name']). '.' .  $ext;
        }

        $partner = Partner::create($data);

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'info');

        return redirect()->route('admin.partners.index');
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
    public function edit($id)
    {
        $partner = Partner::find($id);
        if ( is_null( $partner ) ) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        return view('backend.partners.edit', compact( 'partner' ) );
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
        $request->merge(['status' => intval($request->status)]);

        $partner = Partner::find($id);
        if (is_null($partner)) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        $validator = Validator::make($data = $request->all(), Partner::rules($id));

        $validator->setAttributeNames(trans('partners'));

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image')) {
            $image  = $request->image;
            $ext    = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $image  = \Image::make($request->image)->resize(200, 50);
            //resize
            if ($image->height() > $image->width()) {
                if ($image->height() >= 50) {
                    $image->resize(null, 50, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            } else {
                if ($image->height() >= 50) {
                    $image->resize(null, 50, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
                elseif ($image->width() >= 200) {
                    $image->resize(200, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            }

            \File::makeDirectory('assets/media/images/partners/' .  date('dm'), 0775, true, true);
            if(\File::exists(asset('assets/media/images/partners/' . $partner->image))) 
                \File::delete(public_path(). '/assets/media/images/partners/' . $partner->image);
            $timestamp = time();
            $image->save('assets/media/images/partners/' .  date('dm') . '/' . str_slug($data['name']). "_" . $timestamp . '.' .  $ext);
            $data['image'] = date('dm') . '/' . str_slug($data['name']). "_" . $timestamp . '.' .  $ext;
        }

        $partner->update($data);

        // partner::clearCache();

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'info');

        return redirect()->route('admin.partners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $partner = partner::find($id);
        if (is_null($partner)) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        if(\File::exists(asset('assets/media/images/partners/' . $partner->image)))
            \File::delete(public_path(). '/assets/media/images/partners/' . $partner->image);

        $partner->delete();
        // partner::clearCache();

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'success');

        return redirect()->route('admin.partners.index');
    }
}
