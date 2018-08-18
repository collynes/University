<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('ft.transfer');
});



Route::get('/student/new','StudentsController@new');
Route::post('/student','StudentsController@add');
Route::get('/students','StudentsController@index');
Route::get('/course/index','CoursesController@index');
Route::post('/course/new','CoursesController@new');
Route::get('/enroll/new','EnrollmentController@index');
Route::post('/enroll/enroll','EnrollmentController@new');
Route::get('/enroll/checkquorum','CoursesController@courseStudents');





