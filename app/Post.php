<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Post extends \Jenssegers\Mongodb\Eloquent\Model{ use Notifiable;

    protected $attributes = [
     'likedBy' => array(),
     'comments' => array()
    ];
    protected $fillable = [
        'id', 'content', 'imagePath', 'link'
    ];

    protected $hidden = [
      'user_id'
    ];

    public function user(){
     return $this->belongsTo("App\User");
    }
    public function comments() {
     return $this->hasMany('App\Comment');
    }

}
