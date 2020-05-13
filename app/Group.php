<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function users(){
        // Un Group pertenece a muchos Users
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
