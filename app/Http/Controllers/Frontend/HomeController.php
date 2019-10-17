<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Slider;
use App\News;
use App\Models\Project;
use App\Models\ProjectCategory;

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
        $sliders = Slider::getSliders();
        $news = News::getHomeNews();
        $projectCategories = ProjectCategory::getProjectCategories();
        $projects = Project::getProject();
        return view('frontend.pages.home', compact('sliders', 'news', 'projectCategories', 'projects'));
    }

    public function changeLanguage($language)
    {
        \Session::put('website_language', $language);
        
        return redirect()->back();
    }
}
