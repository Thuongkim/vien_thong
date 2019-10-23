<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Partner extends Model
{
    public static function rules($id = 0) {

        return [
			'name'   => 'required|max:255',
			'slogan' => 'max:255',
			'image'  => ($id == 0 ? 'required' : ''). '|max:2048|mimes:jpg,jpeg,png,gif',
			'status' => 'in:0,1',
        ];

    }

	// Don't forget to fill this array
	protected $fillable = [ 'name', 'slogan', 'status', 'image' ];

	public static function boot()
    {
        parent::boot();
        static::created(function($partner)
        {
            self::clearCache();
        });
        static::updated(function($partner)
        {
            self::clearCache();
        });
        static::deleted(function($partner)
        {
            self::clearCache();
        });
        static::saved(function($partner)
        {
            self::clearCache();
        });
    }
    public static function clearCache()
    {
        Cache::forget('partners');
    }
    public static function getPartner()
    {
        if (!Cache::has('partners')) {
            $partners = Partner::where('status', 1)->orderBy( 'updated_at', 'desc')->get();
            $partners = json_encode($partners) ;
            if ($partners) Cache::forever( 'partners', $partners) ;
        } else {
            $partners = Cache::get( 'partners');
        }
        return json_decode($partners, 1);
    }
}
