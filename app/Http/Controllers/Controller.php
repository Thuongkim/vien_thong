<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\StaticPage;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ServiceCategory;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
    	view()->share('staticPages', StaticPage::getByAllWihoutGroup());
    	view()->share('staticPagess', StaticPage::getMenu());
        view()->share('servicesCategories', ServiceCategory::getByAll());
    }
}
