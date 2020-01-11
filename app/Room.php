<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //

    public function rents(){
        return $this->hasMany(Rent::class);
    }
}
