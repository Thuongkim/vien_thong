<?php

namespace App;

use Illuminate\Support\Facades\Cache;

class District extends \Eloquent {

	public $timestamps = false;

    protected $fillable = ['name', 'status', 'province_id', 'code'];

	public static function boot()
    {
        parent::boot();

        static::updated(function($district)
        {
            self::clearCache();
        });

        static::deleted(function($district)
        {
            self::clearCache();
        });

        static::created(function($district)
        {
            self::clearCache();
        });

        static::saved(function($district)
        {
            self::clearCache();
        });
    }

    public static function clearCache()
    {
        Cache::forget('districts_provinces');
    }
}
