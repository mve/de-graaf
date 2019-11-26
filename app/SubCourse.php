<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCourse extends Model
{
    public function mainCourse(){
        return $this->belongsTo(MainCourse::class);
    }

    public function products(){
        return $this->hasMany(Product::class, 'sub_course_id', 'id');
    }

}
