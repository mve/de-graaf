<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Reservation extends Model
{
    use Notifiable;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function tables(){
        return $this->belongsToMany('App\Table', 'reservation_tables', 'reservation_id', 'table_id');
    }
    public function receipt(){
        return $this->hasOne(Receipt::class);
    }
}
