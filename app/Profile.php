<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile_users';
    protected $fillable = [
        'city', 'bio', 'gender', 'facebook' , 'user_id'
    ];

    // Function to make relation between user and profile
    public function user(){
       return $this->belongsTo('App\User', 'user_id' );
    }
}
