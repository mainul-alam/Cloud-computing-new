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
Route::get('/employee/all_jobs', 'EmployeeController@showAllJobs')->name('E_All_Jobs')->middleware('employee');
// Route::get('/employee/{id}', 'EmployeeController@show')->name('R_JobDetails')->middleware('employee');
Route::get('/employee/cv_view', 'EmployeeController@form')->name('E_newCv_page')->middleware('employee');


Route::get('/employer', 'EmployerController@index')->name('R_Home')->middleware('employer');
Route::get('/employer/all_jobs', 'EmployerController@showAllJobs')->name('R_All_Jobs')->middleware('employer');
Route::get('/employer/create_new_job', 'EmployerController@form')->name('R_newJob_page')->middleware('employer');
Route::post('/employer/create_new_job', 'EmployerController@create')->name('R_newJob_post')->middleware('employer');
Route::get('/employer/{id}', 'EmployerController@show')->name('R_JobDetails')->middleware('employer');
Route::get('/employer/{id}/edit', 'EmployerController@edit')->name('R_JobDetailsEdit')->middleware('employer');
Route::put('/employer/{id}/edit', 'EmployerController@update')->name('R_JobDetailsUpdate')->middleware('employer');
Route::delete('/employer/{id}/delete', 'EmployerController@destroy')->name('R_JobDetailsdelete')->middleware('employer');






