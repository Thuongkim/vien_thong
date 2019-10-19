<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Service extends Model
{
    public static function rules($id = 0) {

        return [
            'title'      => 'required|max:255',
            'icon'      => 'required|max:255',
            'summary'    => 'required|max:500',
            'content'    => 'required',
            'image'      => ($id == 0 ? 'required|' : '') . 'max:2048|mimes:jpg,jpeg,png,gif',
            'category'   => 'required|integer',
            'created_by' => 'integer',
        ];

    }

    public function translation($field, $locale = null) {
        if ($locale == null) {
            $locale = config('app.locales')[0];
        }
        return $this->morphMany('App\Translation', 'translatable')->where('locale', $locale)->where('name', $field); //->first();
    }
    public static function clearCache()
    {
       $services = [];
        if (!Cache::has('services')) {
            $services = Service::where('status', 1)->select('id', 'title', 'summary', 'image')->orderBy('updated_at', 'desc')->get();
            $services = json_encode($services);
            Cache::forever('services', $services, 1);
        } else {
            $services = Cache::get('services');
        }

        return json_decode($services, 1);
    }
     public function category()
    {
        return $this->belongsTo("\App\Models\ServiceCategory");
    }
    public static function boot()
    {
        parent::boot();

        static::created(function($news)
        {
            self::clearCache();
        });

        static::updated(function($news)
        {
            self::clearCache();
        });

        static::deleted(function($news)
        {
            self::clearCache();
        });

        static::saved(function($news)
        {
            self::clearCache();
        });
    }

	// Don't forget to fill this array
	protected $fillable = [ 'title', 'summary', 'content', 'status', 'image', 'position', 'icon', 'category_id','featured', 'created_by' ];

    private static function increase_count( $id, $redis ) {

        //$redis = \App::make('redis');

        $redis->hincrby("product_counter_view_$id", 'counter_view_product', 1);
        $add_to_change_list = $redis->get("add_to_change_list_$id");
        if ( !$add_to_change_list || 1 ) {
            $redis->lpush("product_change_list", $id);
            $redis->setex("add_to_change_list_$id", \Config::get('products.write_count_cycle'), "change_after");
        }
    }

}
