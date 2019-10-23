<?php namespace App;

use Illuminate\Support\Facades\Cache;

class StaticPage extends \Eloquent
{
    protected $fillable = [ 'slug', 'title', 'description', 'status' ];

    public static function rules($id = 0) {
        return [
            'title'                 => 'required|max:255',
            'description'           => 'required',
        ];

    }

    public function translation($field, $locale = null) {
        if ($locale == null) {
            $locale = config('app.locales')[0];
        }
        return $this->morphMany('App\Translation', 'translatable')->where('locale', $locale)->where('name', $field); //->first();
    }
    public static function boot()
    {
        parent::boot();
        static:: created (function($staticpage)
        {
            self::clearCache();
        });
        static:: updated (function($staticpage)
        {
            self::clearCache();
        });
        static::deleted(function($staticpage)
        {
            self::clearCache();
        });
        static::saved(function($staticpage)
        {
            self::clearCache();
        });
    }
    public static function clearCache()
    {
        Cache::forget('introduction');
        Cache::forget('contact');
        Cache::forget('static_pages');
        Cache::forget('static_pagess');
    }

    public static function introduction()
    {
    	$introduction = [];
        $langs = config('app.locales');
        if (!Cache::has('introduction')) {
            $introduction = StaticPage::where('status', 1)->where('slug', 'gioi-thieu')->select('id', 'title', 'slug')->first();
            if (is_null($introduction)) {
                return null;
            }
            $tmp = [];
            for ($i = 0; $i < count($langs); $i++) {
                $trans = $introduction->translation('title', $langs[$i])->first();
                $tmp[$langs[$i]] = is_null($trans) ? '' : $trans->content;
            }

            $tmp['slug'] = $introduction->slug;

            $introduction = json_encode($tmp);
            Cache::put('introduction', $introduction, 3600);
        } else {
            $introduction = Cache::get('introduction');
        }

        return json_decode($introduction, 1);
    }
    public static function getByAllWihoutGroup()
    {
        $staticPages = [];
        $langs = config('app.locales');
        if (!Cache::has('static_pages')) {
            $staticPagess = StaticPage::where('status', 1)->whereNull('group')->get();
            $tmp = [];
            foreach ($staticPagess as $staticPage) {
                for ($i = 0; $i < count($langs); $i++) {
                    $trans = $staticPage->translation('title', $langs[$i])->first();
                    $tmp[$langs[$i]][$staticPage->slug]['title'] = is_null($trans) ? '' : $trans->content;
                    $trans = $staticPage->translation('description', $langs[$i])->first();
                    $tmp[$langs[$i]][$staticPage->slug]['description'] = is_null($trans) ? '' : $trans->content;
                }
                // dd($tmp);
                $staticPages = json_encode($tmp);
            }
           if ($staticPages) Cache:: forever( 'static_pages', $staticPages) ; 
        } else {
            $staticPages = Cache::get('static_pages');
        }
        // dd($staticPages);
        return json_decode($staticPages, 1);
    }
    public static function getMenu()
    {

        $staticPagess = [];
        $langs = config('app.locales');
        if (!Cache::has('static_pagess')) {
            $tem = StaticPage::where('status', 1)->where('group', 1)->get();
            foreach ($tem as $staticPages) {
                $tmp = [];
                $tmp['slug'] = $staticPages->slug;
                for ($i = 0; $i < count($langs); $i++) {
                    $trans = $staticPages->translation('title', $langs[$i])->first();
                    $tmp[$langs[$i]]['title'] = is_null($trans) ? '' : $trans->content;
                    $trans = $staticPages->translation('description', $langs[$i])->first();
                    $tmp[$langs[$i]]['description'] = is_null($trans) ? '' : $trans->content;

                }
                array_push($staticPagess, $tmp);
            }
            // dd($staticPagess);
            $staticPagess = json_encode($staticPagess) ;
            if ($staticPagess) Cache:: forever( 'static_pagess', $staticPagess) ;
        } else {
            $staticPagess = Cache::get('static_pagess');
        }

        // dd($staticPagess);
        return json_decode($staticPagess, 1);
    }
    public static function contact()
    {
        $contact = [];
        $langs = config('app.locales');
        if (!Cache::has('contact')) {
            $contact = StaticPage::where('status', 1)->where('slug', 'lien-he')->select('id', 'title', 'slug', 'description')->first();
            if (is_null($contact)) {
                return null;
            }
            $tmp = [];
            for ($i = 0; $i < count($langs); $i++) {
                $trans = $contact->translation('title', $langs[$i])->first();
                $tmp[$langs[$i]]['title'] = is_null($trans) ? '' : $trans->content;
                $trans = $contact->translation('description', $langs[$i])->first();
                $tmp[$langs[$i]]['description'] = is_null($trans) ? '' : $trans->content;
            }

            $tmp['slug'] = $contact->slug;

            $contact = json_encode($tmp);
            Cache::put('contact', $contact, 3600);
        } else {
            $contact = Cache::get('contact');
        }

        return json_decode($contact, 1);
    }
}