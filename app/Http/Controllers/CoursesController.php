<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Course;
use App\Student;
class CoursesController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * 
     * 
     */
    
    
    public function index()
    {
        
        return 'Under Development';

    }
    public function new(Request $request)
    {
        //dd('_token');
        $create = Course::create($request->except('_token'));
       
        
    }
   
   
}