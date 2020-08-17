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

###### we will work here later #####

Auth::routes(); # this is the rout for any kind of authetication job

############




Route::get('/', 'PagesController@index')->name('welcome'); 

Route::get('/employee', 'EmployeeController@index')->name('employee')->middleware('employee');




Route::get('/employer', 'EmployerController@index')->name('R_Home')->middleware('employer');
Route::get('/employer/create_new_job', 'EmployerController@form')->name('R_newJob_page')->middleware('employer');
Route::post('/employer/create_new_job', 'EmployerController@create')->name('R_newJob_post')->middleware('employer');
Route::get('/employer/{id}', 'EmployerController@show')->name('R_JobDetails')->middleware('employer');









