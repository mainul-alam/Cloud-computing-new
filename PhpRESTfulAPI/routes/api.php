<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('jobs/{user_id}','ApiController@getAllJobs');
Route::get('job/{id}','ApiController@getJob');
Route::post('new_job','ApiController@createNewJob');
Route::put('update_jobs/{id}','ApiController@updateJob');
Route::delete('delete_jobs/{id}','ApiController@deleteJob');