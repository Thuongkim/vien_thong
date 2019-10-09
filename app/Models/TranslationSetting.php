<?php

namespace App;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Schema;

class TranslationSetting extends Model
{
    public static function set($key, $value = '')
    {
        if (is_array($key)) {
            foreach ($key as $array_key => $array_value) {
                $setting = self::firstOrNew(['table_name' => $array_key]);
                $setting->value = $array_value;
                $setting->save();
            }
        } else {
            $setting = self::firstOrNew(['table_name' => $key]);
            $setting->value = $value;
            $setting->save();
        }

        return true;
    }

    public static function get($key, $default = '')
    {
        $result = [];
        if (Schema::hasTable('translation_settings')) {
            $value = DB::table('translation_settings')->where('table_name', $key)->pluck('field_name', 'field_name')->toArray();
            return $value;
        }

        return $default;
    }

    public static function remove($key)
    {
        $setting = self::where('table_name', $key);
        $setting->delete();
    }
}