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

/**
 *  By Ismail Ashour
 */
// Auth Routes
Route::auth();

// Dashboard Route
Route::middleware('auth')->get('/', function () {
    return View('dashboard.index');
})->name('dashboard');
Route::middleware('auth')->get('dashboard', function () {
    return View('dashboard.index');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('tasks', 'TasksController');
    Route::resource('tasksapi', 'TasksApiController');

    Route::get('rentals', 'RentalsController@index');
    Route::get('rentals/{rental}', 'RentalsController@show');

    Route::get('inquires', 'InquiryController@index');
});
