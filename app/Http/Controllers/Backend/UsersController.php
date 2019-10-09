<?php

namespace App\Http\Controllers\Backend;

use DB;
use Hash;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::where('activated', 1)->orderBy('id','DESC')->paginate(\App\Define\Constant::PAGE_NUM_20);

        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::select('display_name','id')->get();
        return view('backend.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['activated' => $request->input('status', 0)]);

        $validator = \Validator::make($data = $request->all(), User::rules());
        $validator->setAttributeNames(trans('users'));
        if ($validator->fails()) return back()->withErrors($validator)->withInput();

        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        foreach ($request->input('roles') as $role) {
            $user->attachRole($role);
        }

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'success');

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('backend.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = intval($id);
        $user = User::where('id', $id)->where('email', '<>', 'system@' . env('APP_NAME', 'bctech.vn'))->first();
        if (is_null($user)) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        $uRoles = $user->roles->pluck('id','id')->toArray();

        $roles = Role::select('display_name','id')->get();

        return view('backend.users.edit',compact('user','roles','uRoles'));
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
        $user = User::where('id', $id)->where('email', '<>', 'system@' . env('APP_NAME', 'bctech.vn'))->first();
        if (is_null($user)) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        $request->merge(['activated' => $request->input('status', 0)]);

        $validator = \Validator::make($data = $request->all(), User::rules($id));
        $validator->setAttributeNames(trans('users'));
        if ($validator->fails()) return back()->withErrors($validator)->withInput();

        $user->update($data);
        DB::table('role_user')->where('user_id', $id)->delete();

        foreach ($request->input('roles') as $role) {
            $user->attachRole($role);
        }

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'success');

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find(intval($id));
        if (is_null($user) || $user->id == \Auth::guard('admin')->user()->id) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }
        $user->activated = 0;
        $user->save();
        // $user->delete();
        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'success');

        return redirect()->route('admin.users.index');
    }
}
