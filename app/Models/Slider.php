<?php namespace App;

use Illuminate\Support\Facades\Cache;

class Slider extends \Eloquent
{
    protected $fillable = [ 'name', 'summary', 'status', 'position', 'image' ];

    public static function rules($id = 0) {
        return [
            'name'    => 'required|max:50',
            'summary' => 'required|max:255',
            'image'   => ($id == 0 ? 'required|' : '') . 'max:4096|mimes:jpg,jpeg,png,gif,svg',
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

        static::updated(function($page)
        {
            self::clearCache();
        });

        static::deleted(function($page)
        {
            self::clearCache();
        });

        static::saved(function($page)
        {
            self::clearCache();
        });
    }

    public static function clearCache()
    {
        Cache::forget('sliders');
    }

    public static function getSliders()
    {
        $sliders = [];
        $langs = config('app.locales');
        if (!Cache::has('sliders')) {
            $temp = Slider::where('status', 1)->orderBy('position')->get();

            foreach ($temp as $slider) {
                $tmp = [];
                $trans = $slider->image;
                $tmp['image'] = is_null($trans) ? '' : $trans;
                for ($i = 0; $i < count($langs); $i++) {
                    $trans = $slider->translation('name', $langs[$i])->first();
                    $tmp[$langs[$i]]['name'] = is_null($trans) ? '' : $trans->content;
                    $trans = $slider->translation('summary', $langs[$i])->first();
                    $tmp[$langs[$i]]['summary'] = is_null($trans) ? '' : $trans->content;
                }

                array_push($sliders, $tmp);
            }

            $sliders = json_encode($sliders);
            Cache::put('sliders', $sliders, 3600);
        } else {
            $sliders = Cache::get('sliders');
        }
        return json_decode($sliders, 1);
    }
}