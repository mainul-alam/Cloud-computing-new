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


Route::get('/employer', 'EmployerController@index')->name('employer')->middleware('employer');
Route::get('/employer/new_job', 'EmployerController@newJob')->name('employer')->middleware('employer');
Route::post('/employer/new_job/post_job','PostsController@create')->name('employer')->middleware('employer');









