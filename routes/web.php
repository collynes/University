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


Route::post('/fundTransfer','FundTransferController@fundTransfer');
Route::get('/bill/query','NairobiWaterController@qb');
Route::get('/startimes/query','StartimesController@qb');
Route::get('/nrb/pay','NairobiWaterController@pb');
Route::post('/nrb/payBill','NairobiWaterController@payBill');
Route::post('/nrb/queryBill','NairobiWaterController@queryBill');
Route::get('/stmt/bfub','MiniStmtBfubController@nay');
Route::post('/stmt/bfub','MiniStmtBfubController@getBfub');
Route::get('/stmt/card','MiniStmtCardController@nay');
Route::post('/stmt/card','MiniStmtCardController@getCard');
Route::get('/airtel/kyc','AirtelController@kyc');
Route::post('/airtel/kyc','AirtelController@postKyc');
Route::get('/airtel/transfer','AirtelController@transfer');
Route::post('/airtel/transfer','AirtelController@postTransfer');
Route::get('/nhif','NHIFController@nay');
Route::post('/nhif/get','NHIFController@get');
Route::get('/student/new','StudentsController@new');
Route::post('/student','StudentsController@add');
Route::get('/students','StudentsController@index');
Route::get('/course/view','CoursesController@view');
Route::get('/course/index','CoursesController@new');
Route::post('/course/add','CoursesController@add');
Route::get('/enroll/new','EnrollmentController@index');
Route::post('/enroll/enroll','EnrollmentController@new');
Route::get('/enroll/checkquorum','EnrollmentController@quorum');





