<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Comment extends \Jenssegers\Mongodb\Eloquent\Model{ use Notifiable;

    protected $attributes = [
     'likedBy' => array()
    ];
    protected $fillable = [
      'id', 'content', 'user_id', 'post_id'
    ];

    protected $with = [
      'user'
    ];

    public function post(){
     return $this->belongsTo("App\Post");
    }
    public function user(){
     return $this->belongsTo("App\User");
    }

}
