<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use App\Define\Constant as Constant;

class Service extends Model
{
    public static function rules($id = 0) {

        return [
            'title'        => 'required|max:255',
            'icon'         => 'required|max:255',
            'summary'      => 'required|max:1024',
            'summary_long' => 'required|max:1024',
            'content'      => 'required',
            'image'        => ($id == 0 ? 'required|' : '') . 'max:2048|mimes:jpg,jpeg,png,gif',
            'image_logo'        => ($id == 0 ? 'required|' : '') . 'max:2048|mimes:jpg,jpeg,png,gif',
            'category'     => 'required|integer',
            'created_by'   => 'integer',
        ];

    }

    public function translation($field, $locale = null) {
        if ($locale == null) {
            $locale = config('app.locales')[0];
        }
        return $this->morphMany('App\Translation', 'translatable')->where('locale', $locale)->where('name', $field); //->first();
    }
        // Don't forget to fill this array
    protected $fillable = [ 'title', 'summary', 'content', 'status', 'image', 'position', 'icon', 'category_id','featured', 'created_by','summary_long', 'image_logo' ];

    public function category()
    {
        return $this->belongsTo("\App\Models\ServiceCategory");
    }
    public static function boot()
    {
        parent::boot();
        static:: created (function($service)
        {
            self::clearCache();
        });
        static:: updated (function($service)
        {
            self::clearCache();
        });
        static::deleted(function($service)
        {
            self::clearCache();
        });
        static::saved(function($services)
        {
            self::clearCache();
        });
    }
    public static function clearCache(){
        Cache::forget('services_new');
    }

    private static function increase_count( $id, $redis ) {

        //$redis = \App::make('redis');

        $redis->hincrby("product_counter_view_$id", 'counter_view_product', 1);
        $add_to_change_list = $redis->get("add_to_change_list_$id");
        if ( !$add_to_change_list || 1 ) {
            $redis->lpush("product_change_list", $id);
            $redis->setex("add_to_change_list_$id", \Config::get('products.write_count_cycle'), "change_after");
        }
    }
    public static function getServiceNews()
    {
        $id_exception = Constant::service_category_id;
        $servicesNews = [];
        $langs = config('app.locales');
        if (!Cache::has('services_new')) {
            $servicess = Service::where('status', 1)->where('category_id', '<>', $id_exception)->where( 'featured', 1)->orderBy( 'updated_at', 'desc')->take(6)->get();

            foreach ($servicess as $service) {
                $tmp = [];
                $id = $service->id;
                $tmp['id'] = is_null($id) ? '' : $id;
                $image = $service->image;
                $tmp['image'] = is_null($image) ? '' : $image;
                $created_by = \App\User::find( $service->created_by );
                $tmp['created_by'] = is_null($created_by) ? '' : $created_by->fullname; 
                $updated_at = $service->updated_at;
                $tmp['updated_at'] = is_null($updated_at) ? '' : $updated_at;
                for ($i = 0; $i < count($langs); $i++) {
                    $trans = $service->translation('title', $langs[$i])->first();
                    $tmp[$langs[$i]]['title'] = is_null($trans) ? '' : $trans->content;
                    $trans = $service->translation('summary', $langs[$i])->first();
                    $tmp[$langs[$i]]['summary'] = is_null($trans) ? '' : $trans->content;
                    $trans = $service->translation('content', $langs[$i])->first();
                    $tmp[$langs[$i]]['content'] = is_null($trans) ? '' : $trans->content;
                }

                array_push($servicesNews, $tmp);
            }
            $servicesNews = json_encode($servicesNews) ;
            if ($servicesNews) Cache:: forever( 'services_new', $servicesNews);
        } else {
            $servicesNews = Cache::get( 'services_new');
        }
    // dd($servicesNews);
        return json_decode($servicesNews, 1);

    }
}
