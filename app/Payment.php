<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
        // eun pago pertenece a un solo arriendo
        public function rent(){
            return $this->belongsTo(Rent::class);
        }
}
