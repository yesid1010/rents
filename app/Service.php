<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //

    // un servicio puede estar en varias rentas
    public function rents(){
        return $this->belongsToMany(Rent::class);
    }
}
