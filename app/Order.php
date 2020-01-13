<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'product_id', 'receipt_id', 'quantity'
    ];
    // Order behoort tot een Nota
    public function receipt(){
        return $this->belongsTo(Receipt::class);
    }
    // Een order bevat een product
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
