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
use App\Models\ServiceCategory;
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
        $items = News::where('status', 1)->where('title', 'like', "%" . $query . "%")->paginate('5');
        $featuredNews = News::where('status', 1)->where('featured', 1)->orderBy('updated_at', 'DESC')->take(6)->get();
        $newsCategories = NewsCategory::getByAll();
        return view('frontend.pages.search', compact('items', 'query', 'featuredNews', 'newsCategories'));
    }
    public function getServicesCategory(Request $request, $slug, $id)
    {
    	$category = ServiceCategory::where('status', 1)->where('id', intval($id))->first();
        // if (is_null($category)) abort('404');
        $childIds = ServiceCategory::where('status', 1)->where('parent_id', $category->id)->pluck('id', 'id')->toArray();
        $services = Service::where('status', 1)->whereIn('category_id', [$category->id] + $childIds)->orderBy('updated_at', 'DESC')->paginate('5');
        $featuredNews = Service::where('status', 1)->where('featured', 1)->orderBy('updated_at', 'DESC')->take(6)->get();
        $rootCat = null;
        if ($category->parent_id) {
            $rootCat = ServiceCategory::where('status', 1)->where('id', $category->parent_id)->first();
            // if (is_null($rootCat)) \App::abort('404');
        }

        $servicesCategories = ServiceCategory::getByAll();
        return view('frontend.pages.service_category', compact('category', 'services', 'rootCat', 'featuredNews', 'servicesCategories'));
    }
    public function getDetailService(Request $request, $slug, $id)
    {
        $services = Service::where('status', 1)->where('id', intval($id))->first();
        if (is_null($services)) \App::abort('404');
        $category = ServiceCategory::where('status', 1)->where('id', $services->category_id)->first();
        if (is_null($category)) \App::abort('404', "Không tìm thấy tài nguyên bạn yêu cầu.");
        $featuredServices = Service::where('status', 1)->orderBy('created_at', 'DESC')->take(6)->get();
        $otherCategories = ServiceCategory::where('status', 1)->where('id', '<>', $services->category_id)->get();

        $rootCat = null;
        if ($category->parent_id) {
            $rootCat = ServiceCategory::where('status', 1)->where('id', $category->parent_id)->first();
            if (is_null($rootCat)) \App::abort('404');
        }
        $servicesCategories = ServiceCategory::getByAll();
        return view('frontend.pages.detail_services', compact('services', 'category', 'lastNews', 'featuredServices', 'otherCategories', 'rootCat', 'servicesCategories'));
    }
}
