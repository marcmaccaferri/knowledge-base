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

Route::get('/', function () {
    return redirect('login');
});

Route::get('/home', function () {
    return redirect('articles');
});

Route::get('/search', 'SearchController@search');

Route::resource('articles', 'ArticleController')->middleware('auth');

Route::resource('category', 'CategoryController')->middleware('auth');

Route::resource('users', 'UsersController')->middleware('auth');
