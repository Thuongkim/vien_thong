<?php namespace App;

use Illuminate\Support\Facades\Cache;
use App\Define\Constant as Constant;

class News extends \Eloquent {

    public static function rules($id = true) {

        return [
            'title'                 => 'required|max:255',
            'summary'               => ($id == true ? 'required' : ''). '|max:500',
            'content'               => 'required',
            'image'                 => 'max:2048|mimes:jpg,jpeg,png,gif',
            'created_by'            => 'integer',
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
	protected $fillable = [ 'title', 'summary', 'content', 'view_counter', 'status', 'image', 'created_by', 'featured', 'category_id' ];

    private static function increase_count( $id, $redis ) {

        //$redis = \App::make('redis');

        $redis->hincrby("product_counter_view_$id", 'counter_view_product', 1);
        $add_to_change_list = $redis->get("add_to_change_list_$id");
        if ( !$add_to_change_list || 1 ) {
            $redis->lpush("product_change_list", $id);
            $redis->setex("add_to_change_list_$id", \Config::get('products.write_count_cycle'), "change_after");
        }
    }

    public static function boot()
    {
        parent::boot();
        static:: created (function($news)
        {
            self::clearCache();
        });
        static:: updated (function($news)
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
    public static function clearCache(){
    	Cache:: forget ('home_news');
    }
    public function category()
    {
        return $this->belongsTo("\App\NewsCategory");
    }
    public static function getHomeNews()
    {
        $id_exception = Constant::news_category_id;
        $homeNews = [];
        $langs = config('app.locales');
        if (!Cache::has('home_news')) {
            $temp = News::where('status', 1)->where('category_id', '<>', $id_exception)->where( 'featured', 1)->orderBy( 'updated_at', 'desc')->take(6)->get();
            foreach ($temp as $home_news) {
                $tmp = [];
                $image = $home_news->image;
                $tmp['image'] = is_null($image) ? '' : $image;
                $created_by = \App\User::find( $home_news->created_by );
                $tmp['created_by'] = is_null($created_by) ? '' : $created_by->fullname; 
                $updated_at = $home_news->updated_at;
                $tmp['updated_at'] = is_null($updated_at) ? '' : $updated_at;
                for ($i = 0; $i < count($langs); $i++) {
                    $trans = $home_news->translation('title', $langs[$i])->first();
                    $tmp[$langs[$i]]['title'] = is_null($trans) ? '' : $trans->content;
                    $trans = $home_news->translation('summary', $langs[$i])->first();
                    $tmp[$langs[$i]]['summary'] = is_null($trans) ? '' : $trans->content;
                    $trans = $home_news->translation('content', $langs[$i])->first();
                    $tmp[$langs[$i]]['content'] = is_null($trans) ? '' : $trans->content;
                }

                array_push($homeNews, $tmp);
            }

            $homeNews = json_encode($homeNews) ;
            if ($homeNews) Cache:: forever( 'home_news', $homeNews) ;
        } else {
            $homeNews = Cache::get( 'home_news');
        }
        return json_decode($homeNews, 1);
    }
}
