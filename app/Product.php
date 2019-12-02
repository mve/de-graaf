<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name', 'sub_course_id', 'price'
    ];
    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function subCourse(){
        return $this->belongsTo(SubCourse::class);
    }



}
