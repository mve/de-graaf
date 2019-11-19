<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Reservation extends Model
{
    use Notifiable;
    protected $fillable = [
        'user_id', 'people', 'used_reservation','date', 'time', 'comment','reservation_type', 'created_at', 'updated_at'
    ];

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
