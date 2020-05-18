<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){
        // un User tiene un Profile
        return $this->hasOne(Profile::class);
    }


    public function level(){
        // un User pertenece a un Level
        return $this->belongsTo(Level::class);
    }

    public function groups(){
        // un User pertenece y tiene muchos Groups
        return $this->belongsToMany(Group::class)->withTimestamps();
    }

    public function location(){
        // un User tiene una Location a traves de Profile
        return $this->hasOneThrough(Location::class, Profile::class);
    }

    public function posts(){
        // un User tiene muchos Posts
        return $this->hasMany(Post::class);
    }

    public function videos(){
        // un User tiene muchos Videos
        return $this->hasMany(Video::class);
    }

    public function comments(){
        // un User tiene muchos Comments
        return $this->hasMany(Comment::class);
    }

    public function image(){
        // un User tiene una Image
        return $this->morphOne(Image::class, 'imageable');
    }
}
