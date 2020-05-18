<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function imageable(){
        // transformacion polimorfismo - uno a uno - uno a muchos
        return $this->morphTo();
    }
}
