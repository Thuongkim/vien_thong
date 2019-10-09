<?php namespace App;

use Illuminate\Support\Facades\Cache;

class Translation extends \Eloquent
{
    protected $fillable = [ 'name', 'content', 'locale', 'translatable', 'translatable_id' ];
}