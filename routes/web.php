<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}

Route::group(['prefix' => 'admin', 'namespace' => 'Backend', 'as' => 'admin.'], function() {
    Route::get('login', ['as' => 'login', 'uses' => 'HomeController@getLogin']);
    Route::group(['before' => 'csrf'], function() {
        Route::post('login', ['as' => 'login', 'uses' => "HomeController@postLogin"]);
    });
    Route::group(['middleware' => 'admin'], function() {
        Route::get('', ['as' => 'home', 'uses' => 'HomeController@index']);
        Route::post('get-district-by-province', ['as' => 'get-district-by-province', 'uses' => 'HomeController@getDistrictByProvince']);
        Route::get('404', ['as' => '404', 'uses' => 'HomeController@get404']);
        Route::get('logout', ['as' => 'logout', 'uses' => "HomeController@getLogout"]);
        Route::get('change-password', ['as' => 'change-password', 'uses' => 'HomeController@changePassword']);
        Route::post('change-password', ['as' => 'change-password', 'uses' => 'HomeController@postChangePassword']);
        Route::get('account', ['as' => 'account', 'uses' => 'HomeController@account']);
        Route::post('account', ['as' => 'account', 'uses' => 'HomeController@postAccount']);
        Route::get('users/delete/{id}', ['as' => 'users.delete', 'uses' => 'UsersController@delete']);
        Route::get('users/update_password/{id}', ['as' => 'users.update_password', 'role' => 'admin.users.update', 'uses' => 'UsersController@changePassword']);
        Route::put('users/post_update_password/{id}', ['as' => 'users.update_password_put', 'role' => 'admin.users.update', 'uses' => 'UsersController@postChangePassword']);
        Route::resource('users', 'UsersController');
        Route::resource('roles', 'RolesController');
        Route::get('setting-caches/redis', ['role' => 'backend', 'as' => 'caches.redis', 'uses' => 'SettingsController@redis']);
        Route::get('news/delete/{id}', array('as' => 'news.delete', 'uses' => 'NewsController@delete'));
        Route::get('news/approve/{id}', array('as' => 'news.approve', 'uses' => 'NewsController@approve'));
        Route::put('news/publish/{id}', array('as' => 'news.publish', 'uses' => 'NewsController@publish'));
        Route::resource('news', 'NewsController');

        Route::get('news-categories/delete/{id}', array('as' => 'news-categories.delete', 'uses' => 'NewsCategoriesController@delete'));
        Route::resource('news-categories', 'NewsCategoriesController');

        Route::get('news/delete/{id}', array('as' => 'news.delete', 'uses' => 'NewsController@delete'));
        Route::post('news/ajaxUpdateBulk', array('as' => 'news.updateBulk', 'role' => 'admin.news.update', 'uses' => 'NewsController@updateBulk'));
        Route::resource('news', 'NewsController');
        Route::get('static-pages/delete/{id}', array('as' => 'static-pages.delete', 'uses' => 'StaticPagesController@delete'));
        Route::resource('static-pages', 'StaticPagesController');

        Route::resource('static-pages', 'StaticPagesController');


        Route::get('locations', ['role' => 'backend', 'as' => 'locations.index', 'uses' => 'LocationsController@index']);
        Route::post('locations/update', ['role' => 'backend', 'as' => 'locations.update', 'uses' => 'LocationsController@update']);
        Route::get('locations/{id}', ['role' => 'backend', 'as' => 'locations.show', 'uses' => 'LocationsController@show']);
        Route::post('locations/store', ['role' => 'backend', 'as' => 'locations.store', 'uses' => 'LocationsController@store']) ;

        Route::resource('sliders', 'SlidersController');
        Route::post('projects/ajaxUpdateBulk', array('as' => 'projects.updateBulk', 'role' => 'admin.projects.update', 'uses' => 'ProjectsController@updateBulk'));
        Route::get('projects/delete/{id}', array('as' => 'projects.delete', 'uses' => 'ProjectsController@delete'));
        Route::resource('projects', 'ProjectsController');
        Route::get('project-categories/delete/{id}', array('as' => 'project-categories.delete', 'uses' => 'ProjectCategoriesController@delete'));
        Route::resource('project-categories', 'ProjectCategoriesController');
    });
});

Route::get('/', [ 'as' => 'home', 'uses' => 'HomeController@home']);