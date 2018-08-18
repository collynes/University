<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Course;
use App\Student;
use App\CourseStudent;

class EnrollmentController extends Controller
{
   
    public function index()
    {     
        $courses = Course::pluck('course','id');
        $students = Student::pluck('fname','id');
        //dd($students);
        return view('enroll.index',['courses'=>$courses],['students'=>$students]);   
                    
    }
    public function quorum()
    {     
        
        return view('enroll.checkquorum');
                    
    }

    
    public function new(Request $request)
    {                      
     //   dd($request);
        $create = CourseStudent::create($request->except('_token'));  
    }
}
