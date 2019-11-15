<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function user(){
        return $this->belongsTo('app/User');
    }
    public function table(){
        return $this->hasManyThrough('app/Table', 'app/reservation_table');
    }
    public function receipt(){
        return $this->hasOne('app/Receipt');
    }
}
