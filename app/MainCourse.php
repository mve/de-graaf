<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainCourse extends Model
{
    // Een maincourse heeft veel subcourses
    public function subCourses(){
        return $this->hasMany(SubCourse::class, 'main_course_id', 'id');
    }
}
