<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts(){
        // relacion polimorfica - transformado por muchos - muchos a muchos
        return $this->morphedByMany(Post::class, 'taggable');
    }

    public function videos(){
        // relacion polimorfica - transformado por muchos - muchos a muchos
        return $this->morphedByMany(Video::class, 'taggable');
    }
}
