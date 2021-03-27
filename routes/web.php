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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['namespace'=>'App\Http\Controllers\projects','middleware'=>'auth'], function () {
    Route::resource('projects', 'ProjectController');
   
    Route::get('delete_project/{id}','ProjectController@destroy')->name('projects_destroy');
});

Route::group(['namespace'=>'App\Http\Controllers\tasks','middleware'=>'auth'], function () {
    Route::resource('tasks', 'TaskController');
   
    Route::get('delete_task/{id}','TaskController@destroy')->name('tasks_destroy');
    Route::get('changestatus/{id?}','TaskController@changeStatus')->name('tasks.status');
});