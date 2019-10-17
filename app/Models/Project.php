<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public static function rules($id = 0) {

        return [
            'title'                 => 'required|max:255',
            'content'               => 'required',
            'image'                 => 'max:2048|mimes:jpg,jpeg,png,gif',
            'category'              => 'required|integer',
        ];

    }

    public function translation($field, $locale = null) {
        if ($locale == null) {
            $locale = config('app.locales')[0];
        }
        return $this->morphMany('App\Translation', 'translatable')->where('locale', $locale)->where('name', $field); //->first();
    }

	// Don't forget to fill this array
	protected $fillable = [ 'title', 'content', 'status', 'image', 'featured', 'category_id' ];

	public function projectCategory()
    {
        return $this->belongsTo('App\Models\ProjectCategory');
    }

    public static function boot()
    {
        parent::boot();
        static:: created (function($project)
        {
            self::clearCache();
        });
        static:: updated (function($project)
        {
            self::clearCache();
        });
        static::deleted(function($project)
        {
            self::clearCache();
        });
        static::saved(function($project)
        {
            self::clearCache();
        });
    }
    public static function clearCache()
    {
        Cache:: forget ('projects');
    }
    public static function getProject()
    {
        $projects = [];
        $langs = config('app.locales');
        if (!Cache::has('projects')) {
            $temp = Project::where('status', 1)->where( 'featured', 1)->orderBy( 'updated_at', 'desc')->get();
            foreach ($temp as $project) {
                $tmp = [];
                $id = $project->category_id;
                $tmp['category_id'] = is_null($id) ? '' : $id;
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
            if ($projects) Cache:: forever( 'projects', $projects) ;
        } else {
            $projects = Cache::get( 'projects');
        }
        return json_decode($projects, 1);
    }
}
