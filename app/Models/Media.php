<?php namespace App;

class Media extends \Eloquent
{
    protected $fillable = [ 'source', 'title', 'created_by', 'status', 'type', 'ref_id', 'size' ];
}