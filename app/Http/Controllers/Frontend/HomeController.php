<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Define\Constant as Constant;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Cache;


use App\News;
use App\Slider;
use App\Models\Project;
use App\Models\Partner;
use App\Models\ProjectCategory;

use App\StaticPage;
use App\NewsCategory;
use App\Models\Service;
use App\Models\ServiceCategory;
class HomeController extends Controller
{
	private $lang;
	private $projects;
	private $projectCategories;

	public function __construct()
    {
        \View::share('staticPages', StaticPage::getByAllWihoutGroup());
        \View::share('staticPagess', StaticPage::getMenu());
        \View::share('servicesCategories', ServiceCategory::getByAll());
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
        $servicess = [];
        $langs = config('app.locales');
		$sliders           = Slider::getSliders();
		$services = Service::where('featured', 1)->where('status', 1)->orderBy('position')->take(5)->get();

        foreach ($services as $service) {
            $tmp = [];
            $icon = $service->icon;
            $tmp['icon'] = is_null($icon) ? '' : $icon;
            $image = $service->image;
            $tmp['image'] = is_null($image) ? '' : $image;
            $id = $service->id;
            $tmp['id'] = is_null($id) ? '' : $id;
            $created_by = \App\User::find( $service->created_by );
            $tmp['created_by'] = is_null($created_by) ? '' : $created_by->fullname; 
            $updated_at = $service->updated_at;
            $tmp['updated_at'] = is_null($updated_at) ? '' : $updated_at;
            for ($i = 0; $i < count($langs); $i++) {
                $trans = $service->translation('title', $langs[$i])->first();
                $tmp[$langs[$i]]['title'] = is_null($trans) ? '' : $trans->content;
                $trans = $service->translation('summary', $langs[$i])->first();
                $tmp[$langs[$i]]['summary'] = is_null($trans) ? '' : $trans->content;
                $trans = $service->translation('content', $langs[$i])->first();
                $tmp[$langs[$i]]['content'] = is_null($trans) ? '' : $trans->content;
            }

            array_push($servicess, $tmp);
        }

        $servicess = json_encode($servicess) ;
        $servicess = json_decode($servicess, 1);
        // dd($servicess);
		$news              = News::getHomeNews();
		$projectCategories = ProjectCategory::getProjectCategories();
		$projects          = Project::getProject();
		$partners          = Partner::getPartner();
        return view('frontend.pages.home', compact('sliders', 'news', 'projectCategories', 'projects', 'partners', 'services', 'servicess'));
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
    

    public function showNews($slug, $id)
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

    public function showProject($slug, $id)
    {
		$project = Project::find($id);
		$news_all = News::getHomeNews();
		return view('frontend.pages.project-detail', compact('project', 'news_all'));
    }
    public function staticPage($slug)
    {
        $page = [];
        $langs = config('app.locales');
        $pages = StaticPage::where('slug', $slug)->where('group', 1)->where('status', 1)->first();
        $tmp = [];
        for ($i = 0; $i < count($langs); $i++) {
            $trans = $pages->translation('title', $langs[$i])->first();
            $tmp[$langs[$i]]['title'] = is_null($trans) ? '' : $trans->content;
            $trans = $pages->translation('description', $langs[$i])->first();
            $tmp[$langs[$i]]['description'] = is_null($trans) ? '' : $trans->content;
        }
        array_push($page, $tmp);
        // dd($page);
        $partners = Partner::getPartner();
        return view('frontend.pages.static', compact('page', 'slug', 'partners'));
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
        $servicesCategories = [];
        $langs = config('app.locales');

    	$category = ServiceCategory::where('status', 1)->where('id', intval($id))->first();
        $categories = [];
        $temp = [];
        for ($i = 0; $i < count($langs); $i++) {
            $trans = $category->translation('name', $langs[$i])->first();
            $temp[$langs[$i]]['name'] = is_null($trans) ? '' : $trans->content;
        }
        array_push($categories, $temp);
        // if (is_null($category)) abort('404');
        $childIds = ServiceCategory::where('status', 1)->where('parent_id', $category->id)->pluck('id', 'id')->toArray();
        $services = Service::where('status', 1)->whereIn('category_id', [$category->id] + $childIds)->orderBy('updated_at', 'DESC')->paginate('8');

        foreach ($services as $service) {
            $tmp = [];
            $id = $service->id;
            $tmp['id'] = is_null($id) ? '' : $id;
            $image = $service->image;
            $tmp['image'] = is_null($image) ? '' : $image;
            $created_by = \App\User::find( $service->created_by );
            $tmp['created_by'] = is_null($created_by) ? '' : $created_by->fullname; 
            $updated_at = $service->updated_at;
            $tmp['updated_at'] = is_null($updated_at) ? '' : $updated_at;
            for ($i = 0; $i < count($langs); $i++) {
                $trans = $service->translation('title', $langs[$i])->first();
                $tmp[$langs[$i]]['title'] = is_null($trans) ? '' : $trans->content;
                $trans = $service->translation('summary', $langs[$i])->first();
                $tmp[$langs[$i]]['summary'] = is_null($trans) ? '' : $trans->content;
                $trans = $service->translation('content', $langs[$i])->first();
                $tmp[$langs[$i]]['content'] = is_null($trans) ? '' : $trans->content;
            }

            array_push($servicesCategories, $tmp);
        }
        $servicesCategories = json_encode($servicesCategories) ;
        $serviceCategories = json_decode($servicesCategories, 1);

        $featuredNews = Service::where('status', 1)->where('featured', 1)->orderBy('updated_at', 'DESC')->take(6)->get();
        $rootCat = null;
        if ($category->parent_id) {
            $rootCat = ServiceCategory::where('status', 1)->where('id', $category->parent_id)->first();
            // if (is_null($rootCat)) \App::abort('404');
        }
        // dd($categories);
        $servicesCategories = ServiceCategory::getByAll();
        $servicesNew             = Service::getServiceNews();
        // dd($servicesNew);
        $news              = News::getHomeNews();
        return view('frontend.pages.service_category', compact('category', 'services', 'serviceCategories', 'rootCat', 'featuredNews', 'servicesCategories', 'categories', 'servicesNew', 'news'));
    }
    public function getDetailService(Request $request, $slug, $id)
    {
        $detailService = [];
        $langs = config('app.locales');
        $services = Service::where('status', 1)->where('id', intval($id))->first();
        $tmp = [];
        $image = $services->image;
        $tmp['image'] = is_null($image) ? '' : $image;
        $created_by = \App\User::find( $services->created_by );
        $tmp['created_by'] = is_null($created_by) ? '' : $created_by->fullname; 
        $created_at = $services->created_at;
        $tmp['created_at'] = is_null($created_at) ? '' : $created_at;
        for ($i = 0; $i < count($langs); $i++) {
            $trans = $services->translation('title', $langs[$i])->first();
            $tmp[$langs[$i]]['title'] = is_null($trans) ? '' : $trans->content;
            $trans = $services->translation('summary', $langs[$i])->first();
            $tmp[$langs[$i]]['summary'] = is_null($trans) ? '' : $trans->content;
            $trans = $services->translation('content', $langs[$i])->first();
            $tmp[$langs[$i]]['content'] = is_null($trans) ? '' : $trans->content;
        }
        array_push($detailService, $tmp);
        // dd($detailService);
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
        return view('frontend.pages.detail_services', compact('services', 'category', 'lastNews', 'featuredServices', 'otherCategories', 'rootCat', 'servicesCategories', 'detailService'));
    }
    public static function convert_caption($content) 
    { 
        return preg_replace(
            '/\[caption([^\]]+)align="([^"]+)"\s+width="(\d+)"\]\<a([^\]]+)href="([^"]+)"\>(\s*\<img[^>]+>)\s*(.*?)\s*\<\/a\>\s*(.*?)\s*\[\/caption\]/i', 
            '<div\1style="width: \3px" class="wp-caption \2">\4    <a href="\5">      \6    </a>      <p class="caption">\8</p></div>', 
            $content); 
    }
     public static function sidebar() 
    { 
        return view('frontend.pages.sidebar');
    }
}
