<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    // Een tafel hoort bij meerdere reserveringen.
    public function reservation(){
        return $this->belongsToMany('App/Reservation', 'reservation_tables', 'table_id', 'reservation_id');
    }
}
