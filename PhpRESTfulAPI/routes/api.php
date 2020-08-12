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


Route::get('jobs','ApiController@getAllJobs');
Route::get('jobs/{id}','ApiController@getOneJob');
Route::post('new_job','ApiController@createNewJob');
Route::put('update_jobs/{id}','ApiController@updateJob');
Route::delete('delete_jobs/{id}','ApiController@deleteJob');