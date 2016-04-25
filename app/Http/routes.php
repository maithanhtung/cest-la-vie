<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//---------------------------------------QUAN LY------------------------------------------------
Route::get('/quanly/login','QuanlyAuth\AuthController@showLoginForm');
Route::post('/quanly/login','QuanlyAuth\AuthController@login');

//Route::get('/quanly','QuanlyController@index');

// Route::get('quanly/register', 'QuanlyAuth\AuthController@showRegistrationForm');
// Route::post('quanly/register', 'QuanlyAuth\AuthController@register');



Route::get('/quanly/logout','QuanlyAuth\AuthController@logout');

Route::group(['middleware' => ['quanly']], function () {

//----HOME
    // Route::get('/quanly/dashboard',function(){
    // 	return view('quanly.dashboard');})->name('viewdashboard');
    Route::get('/quanly/dashboard','QuanlyController@viewDashboard')->name('viewquanlyDashboard');
    
//----SV
    Route::get('/quanly/viewsv','QuanlyController@viewSinhvien')->name('viewSinhvien');

    Route::get('/quanly/addsv',function(){
    	return view('quanly.addsv');})->name('viewaddsv');

    Route::post('/quanly/addsv','QuanlyController@postSinhvien')->name('postSinhvien');

    Route::delete('/quanly/viewsv/{sv_id}', array('uses' => 'QuanlyController@delSinhvien', 'as' => 'delSinhvien'));  
  
//----MON
    Route::get('/quanly/viewmon','QuanlyController@viewMonhoc')->name('viewMonhoc');

    Route::get('/quanly/addmon',function(){
    	return view('quanly.addmon');})->name('viewaddmon');

    Route::post('/quanly/addmon','QuanlyController@postMonhoc')->name('postMonhoc');

    Route::delete('/quanly/viewmon/{mon_id}', array('uses' => 'QuanlyController@delMonhoc', 'as' => 'delMonhoc'));
 

//----GV
    Route::get('/quanly/viewgv','QuanlyController@viewGiaovien')->name('viewGiaovien');

    Route::get('/quanly/addgv',function(){
    	return view('quanly.addgv');})->name('viewaddgv');

    Route::post('/quanly/addgv','QuanlyController@postGiaovien')->name('postGiaovien');

    Route::delete('/quanly/viewgv/{gv_id}', array('uses' => 'QuanlyController@delGiaovien', 'as' => 'delGiaovien'));  
});
// -------------------------------------------SINH VIEN-----------------------------------------
Route::group(['middleware' => ['auth','web']], function(){
	// Route::get('/sinhvien/home', function () {
	// 	return view('sinhvien.sinhvien_home');
	// });
});

// -------------------------------------------GIAO VIEN-----------------------------------------
Route::get('/giaovien/login','GiaovienAuth\AuthController@showLoginForm');
Route::post('/giaovien/login','GiaovienAuth\AuthController@login');
Route::get('/giaovien/logout','GiaovienAuth\AuthController@logout');

Route::group(['middleware' => ['giaovien']], function () {
    
    Route::get('/giaovien/dashboard','GiaovienController@viewDashboard')->name('viewgiaovienDashboard');

   

}); 

//--------------------------------------------INDEX---------------------------------------------
Route::auth();

Route::get('/',function(){
	return view('index');
});