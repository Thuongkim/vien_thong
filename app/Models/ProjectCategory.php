<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
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
    protected $fillable = [ 'name', 'status' ];

    public function projects()
    {
        return $this->hasMany('App\Models\Project');
    }
}
