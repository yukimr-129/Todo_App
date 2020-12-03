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


Route::get('/login/guest', 'HomeController@guestLogin')->name('home.guestlogin');

Route::group(['middleware' => 'auth'], function() {
    
    // Route::group(['middleware' => 'can:view,id'], function() {
    //     Route::get('/folders/{id}/tasks', 'TaskController@index')->name('tasks.index');
    // });
    Route::get('/folders/{id}/tasks', 'TaskController@index')->name('tasks.index');

    Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.show');
    Route::post('/folders/create', 'FolderController@create')->name('folders.create');
    Route::post('/folders/{folder_id}/delete', 'FolderController@destroy')->name('folders.destroy');

    Route::get('/folders/{id}/tasks/create', 'TaskController@showCreateForm')->name('tasks.show');
    Route::post('/folders/{id}/tasks/create', 'TaskController@create')->name('tasks.create');


    Route::get('/folders/{id}/tasks/{task_id}/edit', 'TaskController@showEditForm')->name('task.edit');
    Route::post('/folders/{id}/tasks/{task_id}/edit', 'TaskController@edit')->name('task.update');

    Route::get('/folders/{id}/tasks/{task_id}/delete', 'TaskController@showDeleteForm')->name('task.delete');
    Route::post('/folders/{id}/tasks/{task_id}/delete', 'TaskController@destroy')->name('task.destroy');

    Route::get('/', 'HomeController@index')->name('home');
});







