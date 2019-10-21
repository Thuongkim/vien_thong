<?php namespace App;

use Illuminate\Support\Facades\Cache;

class NewsCategory extends \Eloquent {

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
    protected $fillable = [ 'name', 'parent_id', 'summary', 'status' ];

    public function parent()
    {
        return $this->belongsTo('App\NewsCategory', 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany('App\NewsCategory');
    }

    public function news()
    {
        return $this->hasMany('App\News');
    }

    public static function clearCache()
    {
        //clear cache
        Cache::forget('news_categories');
        Cache::forget('news_categoriess');
    }
    public static function getByAll()
    {
        $categories = [];
        if (!Cache::has('news_categoriess')) {
            $categories = NewsCategory::where('parent_id', 0)->where('status', 1)->get();
            for ($i=0; $i < $categories->count(); $i++) {
                $children = NewsCategory::where('parent_id', $categories{$i}->id)->where('status', 1)->get();
                for ($j=0; $j < $children->count(); $j++) {
                    $children{$j}->children = NewsCategory::where('parent_id', $children{$j}->id)->where('status', 1)->get();

                }
                $categories{$i}->children = $children;
            }

            $categories = json_encode($categories);
            Cache::forever('news_categoriess', $categories, 1);
        } else {
            $categories = Cache::get('news_categoriess');
        }

        return json_decode($categories, 1);
    }

    public static function getCategories()
    {
        //item[$i][lang][property]
        $temp = [];
        $langs = config('app.locales');
        if (!Cache::has('news_categories')) {
            $categories = NewsCategory::where('status', 1)->where('parent_id', 0)->select('id')->get();
            foreach ($categories as $category) {
                $tmp = [];
                $tmp['id'] = $category->id;
                for ($i = 0; $i < count($langs); $i++) {
                    $trans = $category->translation('name', $langs[$i])->first();
                    $tmp[$langs[$i]] = is_null($trans) ? '' : $trans->content;
                }

                $children = NewsCategory::where('status', 1)->where('parent_id', $category->id)->select('id')->get();
                if ($children->count()) {
                    $ch = [];
                    foreach ($children as $child) {
                        $t = [];
                        $t['id'] = $child->id;
                        for ($j = 0; $j < count($langs); $j++) {
                            $trans = $child->translation('name', $langs[$j])->first();
                            $t[$langs[$j]] = is_null($trans) ? '' : $trans->content;
                        }
                        array_push($ch, $t);
                    }

                    $tmp['children'] = $ch;
                }
                array_push($temp, $tmp);
            }

            $categories = json_encode($temp);
            Cache::put('news_categories', $categories, 1);
        } else {
            $categories = Cache::get('news_categories');
        }

        return json_decode($categories, 1);
    }
}
