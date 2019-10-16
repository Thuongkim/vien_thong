<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Slider;
class HomeController extends Controller
{
    public function index(Request $request)
    {
        $sliders = Slider::getSliders();
        return view('frontend.pages.home', compact('sliders'));
    }
}
