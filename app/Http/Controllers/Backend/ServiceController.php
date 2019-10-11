<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use App\Models\Service as Service;
use App\Models\ServiceCategory as ServiceCategory;
use App\TranslationSetting as TranslationSetting;

class ServiceController extends Controller
{
    private $languages;
    private $language;
    private $fields;

    public function __construct()
    {
        $locales = config('app.locales');
        $this->language = $locales[0];
        unset($locales[0]);
        $this->languages = array_flip($locales);
        $this->fields = TranslationSetting::get(with(new Service)->getTable());

        \View::share('languages', $this->languages);
        \View::share('fields', $this->fields);
    }

    public function index(Request $request)
    {
        $query = '1=1';

        $title                  = $request->input('title');
        $status                 = intval($request->input('status', -1));
        $featured               = intval($request->input('featured', -1));
        $category               = intval($request->input('category_id', -1));
        $date_range             = $request->input('date_range');
        $page_num               = intval($request->input('page_num', \App\Define\Constant::PAGE_NUM_20));

        if( $title ) $query .= " AND title like '%" . $title . "%'";
        if($status <> -1) $query .= " AND status = {$status}";
        if($featured <> -1) $query .= " AND featured = {$featured}";
        if($category <> -1) {
            $children = ServiceCategory::where('parent_id', $category)->select('id')->get();
            $children = implode(',', array_column($children->toArray(), 'id'));
            $category = ($children ? $category . ',' . $children : $category);
            $query .= " AND category_id IN({$category})";
        }

        if ($date_range)
            $date_range = explode(' - ', $date_range);
        if (isset($date_range[0]) && isset($date_range[1]))
            $query .= " AND created_at >= '" . date("Y-m-d 00:00:00", strtotime(str_replace('/', '-', ($date_range[0] == '' ? '1/1/2015' : $date_range[0]) ))) . "' AND updated_at <= '" . date("Y-m-d 23:59:59", strtotime(str_replace('/', '-', ($date_range[1] == '' ? date("d/m/Y") : $date_range[1]) ))) . "'";

        if (!$request->user()->ability(['system', 'admin'], ['services.approve'])) {
            $query .= " AND created_by = " . $request->user()->id;
        }

        $services = Service::whereRaw($query . ' order by updated_at DESC')->paginate($page_num);

        $categories = [];
        $tmp = ServiceCategory::where('parent_id', 0)->get();
        foreach ($tmp as $category) {
            $categories[$category->id] = $category->name;
            $children = ServiceCategory::where('parent_id', $category->id)->get();
            foreach ($children as $child) {
                $categories[$child->id] = '-- ' . $child->name;
            }
        }

        return view('backend.services.index', compact('services', 'categories'));
    }

    
}
