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

class HomeController extends Controller
{
	private $lang;
	private $projects;
	private $projectCategories;

	public function __construct()
    {
		$this->projectCategories = ProjectCategory::getProjectCategories();
		$this->projects          = Project::getProject();

        \View::share('projects', $this->projects);
        \View::share('projectCategories', $this->projectCategories);

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
		$news              = News::getHomeNews();
		$projectCategories = ProjectCategory::getProjectCategories();
		$projects          = Project::getProject();
		$partners          = Partner::getPartner();
        return view('frontend.pages.home', compact('sliders', 'news', 'projectCategories', 'projects', 'partners'));
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
    	$temp = News::where('status', 1)->where('category_id', '<>', $id_exception)->orderBy( 'updated_at', 'desc')->paginate(4);
    	foreach ($temp as $home_news) {
    		$tmp = [];
    		$image = $home_news->image;
    		$tmp['image'] = is_null($image) ? '' : $image;
    		$id = $home_news->id;
    		$tmp['id'] = is_null($id) ? '' : $id;
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
    	$news_all             = News::getHomeNews();
    	return view('frontend.pages.news', compact('news','temp','news_all'));
    }

    public function showNews($id)
    {
		$news = News::find($id);
		$news_all = News::getHomeNews();
		return view('frontend.pages.news-detail', compact('news', 'news_all'));
    }

    public function indexCareer()
    {
    	$id_exception = Constant::news_category_id;
    	$news = News::where('status', 1)->where('category_id', $id_exception)->orderBy( 'updated_at', 'desc')->paginate(10);
    	$news_all = News::getHomeNews();
		return view('frontend.pages.career', compact('news', 'news_all'));
    }

    public function indexPartner()
    {
    	$partners          = Partner::getPartner();
		return view('frontend.pages.partner', compact('partners'));
    }

    public function indexProject()
    {
    	$projects = [];
        $langs = config('app.locales');
        $temp = Project::where('status', 1)->orderBy( 'updated_at', 'desc')->get();
        foreach ($temp as $project) {
            $tmp = [];
            $id = $project->id;
            $tmp['id'] = is_null($id) ? '' : $id;
            $category_id = $project->category_id;
            $tmp['category_id'] = is_null($category_id) ? '' : $category_id;
            $image = $project->image;
            $tmp['image'] = is_null($image) ? '' : $image;
            for ($i = 0; $i < count($langs); $i++) {
                $trans = $project->translation('title', $langs[$i])->first();
                $tmp[$langs[$i]]['title'] = is_null($trans) ? '' : $trans->content;
                $trans = $project->translation('content', $langs[$i])->first();
                $tmp[$langs[$i]]['content'] = is_null($trans) ? '' : $trans->content;
            }

            array_push($projects, $tmp);
        }
        $projects = json_encode($projects) ;
        $projects = json_decode($projects, 1);
		return view('frontend.pages.project', compact('projects'));
    }

    public function showProject($id)
    {
		$project = Project::find($id);
		$news_all = News::getHomeNews();
		return view('frontend.pages.project-detail', compact('project', 'news_all'));
    }
}
