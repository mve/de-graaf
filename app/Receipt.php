<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable = [
        'reservation_id'
    ];
    // Een nota behoort tot 1 reservering
    public function reservation(){
        return $this->belongsTo(Reservation::class);
    }
    // Een nota bestaat uit meerdere orders
    public function orders(){
        return $this->hasMany(Order::class, 'receipt_id', 'id');
    }
}
