<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
        // un Post pertenece a un User
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function comments(){
        // relacion polimorfica un Post tiene muchos Comments
        return $this->morphMany(Comment::class, 'commentable');
        // 'commentable' => campo que los relaciona
    }

    public function image(){
        // relacion polimorfica un Post tiene una Image
        return $this->morphOne(Image::class, 'imageable');
        // 'imageable' => campo que los relaciona
    }

    public function tags(){
        // relacion polimorfica un Post tiene muchos Tags
        return $this->morphToMany(Tag::class, 'taggable');
    }
}

