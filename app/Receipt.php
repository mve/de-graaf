<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    public function reservation(){
        return $this->belongsTo('app/Reservation');
    }
    public function orders(){
        return $this->hasMany('app/Order');
    }
}
