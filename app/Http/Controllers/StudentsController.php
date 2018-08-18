<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Student;
use Alert;
class StudentsController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function new()
    {
        return view('student.new');
    }
    public function index()
    {
        $students = Student::all();
        Alert::message('Student has been created succesfully');
        return view('student.view',['students'=>$students]);
        

    }
    public function add(Request $request)
    {
        //dd($request->all());

        $create = Student::create($request->except('_token'));
        if($create):
           $students = Student::all();
           return view('student.view',['students'=>$students]);
        endif;
        
    }
}