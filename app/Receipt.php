<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable = [
        'reservation_id'
    ];

    public function reservation(){
        return $this->belongsTo(Reservation::class);
    }
    public function orders(){
        return $this->hasMany(Order::class, 'receipt_id', 'id');
    }
}
