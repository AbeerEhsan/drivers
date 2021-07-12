<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();
Auth::routes(['verify' => true]);








Route::middleware(['adminType','auth'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->middleware('verified');


    Route::get('users/{type?}/', 'UserController@index')
        ->where(['type' => '^([a-z]+(?<!create))'])
        ->name('users.admins1');


    Route::resource('users', 'UserController');

    Route::get('studentAttends/{id}/create', 'StudentAttendController@create')->name('attend.create');
    Route::get('studentAttends/{id}/edit/{student}', 'StudentAttendController@edit')->name('attend.edit');
    Route::get('studentAttends/{id}', 'StudentAttendController@index')->name('attendance');


    Route::get('busStudents/{id}/create', 'BusStudentController@create')->name('bus_Students.create');
    Route::get('busStudents/{id}', 'BusStudentController@index')->name('bus_Students');


    Route::resource('busess', 'BusController');
    // Route::resource('buses', 'BusController');

    Route::resource('busStudents', 'BusStudentController');

    Route::resource('settings', 'SettingController');

    Route::resource('studentInfos', 'StudentInfoController');

    Route::resource('studentAttends', 'StudentAttendController');

});