<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['tag' ];


    // many to many relation function
    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }

}
