<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    public function reservation(){
        return $this->belongsTo('app/Reservation');
    }
}
