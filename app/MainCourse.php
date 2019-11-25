<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainCourse extends Model
{
    public function subCourses(){
        return $this->hasMany(SubCourse::class, 'main_course_id', 'id');
    }
}
