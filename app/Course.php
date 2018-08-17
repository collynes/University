<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = ['id'];
    //

    public function students()
    {
        return $this->belongsToMany('App\Student');
    }

}
