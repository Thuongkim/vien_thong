<?php

namespace App;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public static function rules($id = 0) {
        return [
            'name'              => 'required|max:50|min:5|not_in:system|regex:/^[a-zA-Z0-9_]+([-.][a-zA-Z0-9_]+)*$/|unique:roles,name' . ($id == 0 ? '' : ',' . $id),
            'display_name'      => 'required|max:50',
            'description'       => 'max:255',
            'permissions'       => 'required'
        ];
    }

    protected $fillable = [ 'name', 'display_name', 'description' ];
}