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


Auth::routes();


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'tasks', 'as' => 'task.', 'namespace' => 'Task'], function () {
        Route::get('/', 'TaskController@index')->name('index');
        Route::get('create', 'TaskController@create')->name('create');
        Route::post('create', 'TaskController@store')->name('store');
        Route::get('{task}', 'TaskController@show')->name('show');

        Route::get('{task}/complete', 'TaskCompletionController@store')->name('completion.store');
        Route::get('{task}/uncomplete', 'TaskUncompletionController@store')->name('uncompletion.store');
    });
});

