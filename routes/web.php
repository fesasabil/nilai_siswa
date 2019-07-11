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

Route::get('/', 'SiteController@home');

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');
Route::get('/signup', 'SignupController@signup')->name('signup');
Route::post('/store', 'SignupController@store');

Route::group(['middleware' => ['auth', 'checkRole:admin']], function() {
    Route::get('/student', 'StudentController@index');
    Route::post('/student/create', 'StudentController@create');
    Route::get('/student/{student}/edit', 'StudentController@edit');
    Route::post('/student/{student}/update', 'StudentController@update');
    Route::get('/student/{student}/delete', 'StudentController@delete');
    Route::get('/student/{student}/profile', 'StudentController@profile');
    Route::post('/student/{id}/addvalue', 'StudentController@addvalue');
    Route::get('/student/{id}/{idsubject}/deletevalue', 'StudentController@deletevalue');
    Route::get('/student/exportExcel', 'StudentController@exportExcel');
    Route::get('/student/exportPdf', 'StudentController@exportPdf');

    Route::get('/teacher', 'TeacherController@index');
    Route::get('/teacher/{id}/profileteac', 'TeacherController@profileteac');
    Route::get('/teacher/{id}/editteac', 'TeacherController@editteac');
    Route::post('/teacher/{id}/update', 'TeacherController@update');
});


Route::group(['middleware' => ['auth', 'checkRole:admin,student']], function() {
    Route::get('/dashboard', 'DashboardController@index');
});