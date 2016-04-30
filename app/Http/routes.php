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

//----MON
    Route::get('/quanly/viewmon','QuanlyController@viewMonhoc')->name('viewquanlyMonhoc');

    Route::get('/quanly/viewlopMon/{lop_id}','QuanlyController@viewlopMon')->name('viewquanlylopMonhoc');

    Route::get('/quanly/addmon',function(){
        return view('quanly.addmon');})->name('viewaddmon');

    Route::post('/quanly/addmon','QuanlyController@postMonhoc')->name('postMonhoc');

    Route::delete('/quanly/viewmon/{mon_id}', array('uses' => 'QuanlyController@delMonhoc', 'as' => 'delMonhoc'));

//----LOP
    Route::get('/quanly/viewlop','QuanlyController@viewLophoc')->name('viewquanlyLophoc');

    Route::get('/quanly/viewsvlop/{lop_id}','QuanlyController@viewSvlop')->name('viewquanlySvlop');

    Route::delete('/quanly/viewlop/{lop_id}', array('uses' => 'QuanlyController@delLophoc', 'as' => 'delqlLophoc'));
    
//----SV
    Route::get('/quanly/viewsv','QuanlyController@viewSinhvien')->name('viewSinhvien');

    Route::get('/quanly/addsv',function(){
    	return view('quanly.addsv');})->name('viewaddsv');

    Route::post('/quanly/addsv','QuanlyController@postSinhvien')->name('postSinhvien');

    Route::get('/quanly/sinhviendk/{sv_id}','QuanlyController@viewSinhviendk')->name('viewSinhviendk');

    Route::delete('/quanly/viewsv/{sv_id}', array('uses' => 'QuanlyController@delSinhvien', 'as' => 'delSinhvien'));  
  

//----GV
    Route::get('/quanly/viewgv','QuanlyController@viewGiaovien')->name('viewGiaovien');

    Route::get('/quanly/addgv',function(){
    	return view('quanly.addgv');})->name('viewaddgv');

    Route::post('/quanly/addgv','QuanlyController@postGiaovien')->name('postGiaovien');

    Route::get('/quanly/viewlopGv/{id}','QuanlyController@viewlopGv')->name('viewquanlylopGv');

    Route::get('/quanly/viewsvlopGv/{lop_id}','QuanlyController@viewsvlopGv')->name('viewquanlysvlopGv');

    Route::delete('/quanly/viewgv/{gv_id}','QuanlyController@delGiaovien')->name('delGiaovien');  
});
// -------------------------------------------SINH VIEN-----------------------------------------
Route::get('/sinhvien/login','SinhvienAuth\AuthController@showLoginForm');
Route::post('/sinhvien/login','SinhvienAuth\AuthController@login');
Route::get('/sinhvien/logout','SinhvienAuth\AuthController@logout');

Route::group(['middleware' => ['sinhvien']], function () {

    Route::get('/sinhvien/dashboard','SinhvienController@viewDashboard')->name('viewsinhvienDashboard');

    Route::get('/sinhvien/viewlop/{mon_id}','SinhvienController@viewLophoc')->name('viewsinhvienLophoc');

    Route::get('/sinhvien/dangky/{lop_id}','SinhvienController@dangky')->name('sinhvienDangky');

    Route::get('/sinhvien/viewdangky','SinhvienController@viewDangky')->name('viewsinhvienDangky');

    Route::delete('/sinhvien/viewdangky/{lop_id}','SinhvienController@delDangky')->name('delDangky');

});

// -------------------------------------------GIAO VIEN-----------------------------------------
Route::get('/giaovien/login','GiaovienAuth\AuthController@showLoginForm');
Route::post('/giaovien/login','GiaovienAuth\AuthController@login');
Route::get('/giaovien/logout','GiaovienAuth\AuthController@logout');
Route::get('/giaovien','GiaovienController@viewDashboard');

Route::group(['middleware' => ['giaovien']], function () {
    
    Route::get('/giaovien/dashboard','GiaovienController@viewDashboard')->name('viewgiaovienDashboard');

    Route::get('/giaovien/addlop','GiaovienController@viewaddlop')->name('viewaddlop');

    Route::post('/giaovien/addlop','GiaovienController@postLophoc')->name('postLophoc');

    Route::get('/giaovien/viewdangky/{lop_id}','GiaovienController@viewDangky')->name('viewgiaovienDangky');

    Route::delete('/giaovien/dashboard/{lop_id}','GiaovienController@delLophoc')->name('delLophoc');
});
   

//--------------------------------------------INDEX---------------------------------------------
// Route::auth();

Route::get('/',function(){
	return view('index');
});