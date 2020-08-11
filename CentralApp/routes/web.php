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

Route::get('/', 'PagesController@index'); # this is the welcome page request route

###### we will work here later #####

Auth::routes(); # this is the rout for any kind of authetication job

############

Route::get('/home', 'HomeController@index')->name('home'); # this is requst hadeler after authetication 










###### just keep them 


#


