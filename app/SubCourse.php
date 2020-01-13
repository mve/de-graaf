<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCourse extends Model
{
    //Een subcourse hoort bij 1 maincourse
    public function mainCourse(){
        return $this->belongsTo(MainCourse::class);
    }
    //Een subcourse bevat meerdere producten
    public function products(){
        return $this->hasMany(Product::class, 'sub_course_id', 'id');
    }

}
