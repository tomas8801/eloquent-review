<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function commentable(){
        // transformacion polimorfismo - uno a uno - uno a muchos
        return $this->morphTo();
    }

    public function user(){
        // un Comment pertenece a un User
        return $this->belongsTo(User::class);
    }
}
