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
Route::group(['namespace'=>'App\Http\Controllers\api'], function () {
    Route::get('projects', 'ProjectController@index');
    Route::post('projects/store', 'ProjectController@store');
    Route::post('projects/update/{id}', 'ProjectController@update');
   
    Route::get('projects/delete/{id}','ProjectController@destroy');
});

Route::group(['namespace'=>'App\Http\Controllers\api'], function () {
    Route::get('tasks', 'TaskController@index');
    Route::post('tasks/store', 'TaskController@store');
    Route::post('tasks/update/{id}', 'TaskController@update');
   
    Route::get('tasks/delete/{id}','TaskController@destroy');
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
    'namespace'=>'App\Http\Controllers'

], function ($router) {
    Route::post('/login','AuthController@login');
    Route::post('/register','AuthController@register');
    Route::post('/logout','AuthController@logout');
    Route::post('/refresh','AuthController@refresh');
});