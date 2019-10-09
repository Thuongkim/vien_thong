<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{

    public function redis()
    {
        \Illuminate\Support\Facades\Redis::flushall();
        dd('done');
    	Session::flash('message', "Đã xoá hết cache.");
        Session::flash('alert-class', 'success');
        return redirect()->route('admin.home');
    }

    public function elastic()
    {
        dd('updating...');
    }
}