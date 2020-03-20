<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    //

    // en un arriendo pueden existir uno o  muchos servicios
    public function services(){
        return $this->belongsToMany(Service::class);
    }

    // en un arriendo puede haber una sola habitacion
    public function room(){
        return $this->belongsTo(Room::class);
    }

    // un arriendo puede tener uno o mas pagos
    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
