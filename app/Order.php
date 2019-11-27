<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'product_id', 'receipt_id'
    ];

    public function receipt(){
        return $this->belongsTo(Receipt::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
