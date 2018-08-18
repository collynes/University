<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model
{
    protected $guarded = ['id'];
    protected $table = 'course_student';
}
