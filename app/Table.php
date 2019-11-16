<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    public function reservation(){
        return $this->belongsToMany('App/Reservation', 'reservation_tables', 'reservation_id', 'table_id');

    }
}
