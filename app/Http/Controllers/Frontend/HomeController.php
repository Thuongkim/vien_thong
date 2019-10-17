<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Slider;
use App\StaticPage;
use App\News;
use App\NewsCategory;
use App\Models\Service;
class HomeController extends Controller
{
    public function index(Request $request)
    {
        $sliders = Slider::getSliders();
        $services = Service::where('featured', 1)->where('status', 1)->orderBy('position')->take(5)->get();
        return view('frontend.pages.home', compact('sliders', 'services'));
    }
    public function staticPage($slug)
    {
        $page = StaticPage::where('slug', $slug)->where('group', 1)->where('status', 1)->first();
        // if (is_null($page)) abort('404');

        return view('frontend.pages.static', compact('page'));
    }
    public function search(Request $request)
    {
        $query = htmlentities($request->keyword);
        if (!$query) return redirect()->route('home');
        $items = News::where('status', 1)->where('title', 'like', "%" . $query . "%")->get();
        $featuredNews = News::where('status', 1)->where('featured', 1)->orderBy('updated_at', 'DESC')->take(6)->get();
        $newsCategories = NewsCategory::getByAll();
        return view('frontend.pages.search', compact('items', 'query', 'featuredNews', 'newsCategories'));
    }
}
