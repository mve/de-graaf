<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function subCourse(){
        return $this->belongsTo('app/SubCourse');
    }



}
