<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts(){
        // una Category tiene muchos Posts
        return $this->hasMany(Post::class);
    }

    public function videos(){
        // una Category tiene muchos Videos
        return $this->hasMany(Video::class);
    }

}
