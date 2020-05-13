<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public function users(){
        // Un Level puede tener muchos Users
        return $this->hasMany(User::class);
    }
}
