<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function receipt(){
        return $this->belongsTo('app/Receipt');
    }
}
