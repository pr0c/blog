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

Route::get('/', function () {
    return view('welcome');
});

Route::namespace('Blog')->group(function() {
    Route::get('/categories', 'MainController@index');
    Route::get('/category/{id}', [
        'as' => 'category',
        'uses' => 'MainController@showPosts'
    ]);
    Route::get('/post/{id}', [
        'as' => 'post',
        'uses' => 'MainController@showPost'
    ]);
});
