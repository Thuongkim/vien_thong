<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Slider;
use App\Models\Service;
class HomeController extends Controller
{
    public function index(Request $request)
    {
        $sliders = Slider::getSliders();
        $services = Service::where('featured', 1)->where('status', 1)->orderBy('position')->take(5)->get();
        return view('frontend.pages.home', compact('sliders', 'services'));
    }
}
