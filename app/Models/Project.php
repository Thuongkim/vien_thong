<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public static function rules($id = 0) {

        return [
            'title'                 => 'required|max:255',
            'content'               => 'required',
            'image'                 => 'max:2048|mimes:jpg,jpeg,png,gif',
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
	protected $fillable = [ 'title', 'content', 'status', 'image', 'featured', 'category_id' ];

	public function projectCategory()
    {
        return $this->belongsTo('App\Models\ProjectCategory');
    }

}
