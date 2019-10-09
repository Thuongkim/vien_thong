<?php

namespace App;

use Illuminate\Support\Facades\Cache;

class Province extends \Eloquent {

	public $timestamps = false;
    protected $fillable = ['name', 'status', 'code'];

    public function districts()
    {
        return $this->hasMany(District::class, 'province_id');
    }

    public static function boot()
    {
        parent::boot();

        static::updated(function($province)
        {
            self::clearCache();
        });

        static::deleted(function($province)
        {
            self::clearCache();
        });

        static::created(function($province)
        {
            self::clearCache();
        });

        static::saved(function($province)
        {
            self::clearCache();
        });
    }

    public static function clearCache()
    {
        Cache::forget('districts_provinces');
        Cache::forget('provinces');
    }

    public static function getByAll()
    {
        $provinces = [];
        if (!Cache::has('provinces')) {
            $provinces = Province::where('status', 1)->pluck('name', 'id')->toArray();
            $provinces = json_encode($provinces);
            Cache::forever('provinces', $provinces);
        } else {
            $provinces = Cache::get('provinces');
        }

        return json_decode($provinces, 1);
    }
}
