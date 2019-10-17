<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    public static function rules( $id = 0 ) {

        return [
            'name'                  => 'required|max:50',
            'status'                => 'in:0,1',
        ];

    }

    public function translation($field, $locale = null) {
        if ($locale == null) {
            $locale = config('app.locales')[0];
        }
        return $this->morphMany('App\Translation', 'translatable')->where('locale', $locale)->where('name', $field); //->first();
    }

    // Don't forget to fill this array
    protected $fillable = [ 'name', 'status' ];

    public function projects()
    {
        return $this->hasMany('App\Models\Project');
    }

    public static function boot()
    {
        parent::boot();
        static:: created (function($category)
        {
            self::clearCache();
        });
        static:: updated (function($category)
        {
            self::clearCache();
        });
        static::deleted(function($category)
        {
            self::clearCache();
        });
        static::saved(function($category)
        {
            self::clearCache();
        });
    }
    public static function clearCache()
    {
        Cache:: forget ('categories');
    }
    public static function getProjectCategories()
    {
        $categories = [];
        $langs = config('app.locales');
        if (!Cache::has('categories')) {
            $temp = ProjectCategory::where('status', 1)->orderBy( 'id', 'asc')->get();
            foreach ($temp as $category) {
                $tmp = [];
                $id = $category->id;
                $tmp['id'] = is_null($id) ? '' : $id;
                for ($i = 0; $i < count($langs); $i++) {
                    $trans = $category->translation('name', $langs[$i])->first();
                    $tmp[$langs[$i]]['name'] = is_null($trans) ? '' : $trans->content;
                }

                array_push($categories, $tmp);
            }

            $categories = json_encode($categories) ;
            if ($categories) Cache:: forever( 'categories', $categories) ;
        } else {
            $categories = Cache::get( 'categories');
        }
        return json_decode($categories, 1);
    }
}
