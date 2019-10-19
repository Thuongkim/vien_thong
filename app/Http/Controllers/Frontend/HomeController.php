<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Define\Constant as Constant;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;


use App\News;
use App\Slider;
use App\Models\Project;
use App\Models\Partner;
use App\Models\ProjectCategory;

use App\StaticPage;
use App\News;
use App\NewsCategory;
use App\Models\Service;
use App\Models\ServiceCategory;
class HomeController extends Controller
{
	private $lang;

	public function __construct()
    {
    	$this->middleware(function ($request, $next) {
    		if (!Session::has('website_language')) {
    			$locales = config('app.locales');
    			$this->lang = $locales[0];
    		} else {
	        	$this->lang = Session::get('website_language');
    		}
    		
	        \View::share('lang', $this->lang);
	        return $next($request);
        });
    }
    public function index(Request $request)
    {
		$sliders           = Slider::getSliders();
		$services = Service::where('featured', 1)->where('status', 1)->orderBy('position')->take(5)->get();
		$news              = News::getHomeNews();
		$projectCategories = ProjectCategory::getProjectCategories();
		$projects          = Project::getProject();
		$partners          = Partner::getPartner();
        return view('frontend.pages.home', compact('sliders', 'news', 'projectCategories', 'projects', 'partners', 'services'));
    }

    public function changeLanguage($language)
    {
        \Session::put('website_language', $language);
        
        return redirect()->back();
    }

    public function indexNews()
    {
    	$id_exception = Constant::news_category_id;
    	$homeNews = [];
    	$langs = config('app.locales');
    	$temp = News::where('status', 1)->where('category_id', '<>', $id_exception)->orderBy( 'updated_at', 'desc')->get();
    	foreach ($temp as $home_news) {
    		$tmp = [];
    		$image = $home_news->image;
    		$tmp['image'] = is_null($image) ? '' : $image;
    		$created_by = \App\User::find( $home_news->created_by );
    		$tmp['created_by'] = is_null($created_by) ? '' : $created_by->fullname; 
    		$updated_at = $home_news->updated_at;
    		$tmp['updated_at'] = is_null($updated_at) ? '' : $updated_at;
    		for ($i = 0; $i < count($langs); $i++) {
    			$trans = $home_news->translation('title', $langs[$i])->first();
    			$tmp[$langs[$i]]['title'] = is_null($trans) ? '' : $trans->content;
    			$trans = $home_news->translation('summary', $langs[$i])->first();
    			$tmp[$langs[$i]]['summary'] = is_null($trans) ? '' : $trans->content;
    			$trans = $home_news->translation('content', $langs[$i])->first();
    			$tmp[$langs[$i]]['content'] = is_null($trans) ? '' : $trans->content;
    		}

    		array_push($homeNews, $tmp);
    	}

    	$homeNews = json_encode($homeNews) ;
    	$news = json_decode($homeNews, 1);
    	return view('frontend.pages.news', compact('news'));
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
