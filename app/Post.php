<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;    // because we use softDeletes() at migration so u have to tell the model
    protected $dates = ['deleted_at']; //var is reserved by larave we use also for softDeletes
    protected $fillable = [
        'user_id', 'title', 'content', 'photo' , 'slug'
    ];

    // relation function to make the Post see the it's connected to the user model throught 'user_id'
    // this is one to many relation use ==> belongsTo
    public function user(){
        return $this->belongsTo('App\User', 'user_id' );
     }
     // function to enable display image directly to the index like src="{{$post->photo}}"
    //  public function getFeaturedAttribute($photo) {
    //     return asset($photo);
    //  }
     // many to many relation function
    public function posts()
    {
        return $this->belongsToMany('App\Tag');
    }
    public function tag()
    {
        return $this->belongsToMany('App\Tag');
    }
}
