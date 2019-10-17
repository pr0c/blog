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

Route::namespace('Blog')->prefix('blog')->group(function() {
    Route::get('/', 'MainController@main');
    Route::get('/categories', 'MainController@index');
    Route::get('/category/{id}', [
        'as' => 'category',
        'uses' => 'MainController@showPosts'
    ]);
    Route::get('/post', 'PostController@create');
    Route::post('/post', 'PostController@store');
    Route::get('/post/{id}', [
        'as' => 'post',
        'uses' => 'MainController@showPost'
    ]);
    Route::post('/post/{id}', [
        'as' => 'post',
        'uses' => 'PostController@update'
    ]);
});

Route::namespace('Auth')->prefix('auth')->group(function() {
    Route::get('/register', 'RegistrationController@create');
    Route::post('/register', 'RegistrationController@store');
    Route::get('/', 'AuthController@login')->name('login');
    Route::get('/logout', 'AuthController@logout')->name('logout');
    Route::post('/', 'AuthController@auth');
    Route::prefix('permissions')->group(function() {
        Route::get('/add_role', 'RoleController@addRole')->name('add_role');
        Route::post('/add_role', 'RoleController@store');
    });
});
