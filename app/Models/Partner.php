<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
