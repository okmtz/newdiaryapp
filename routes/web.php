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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/contents', 'ContentController');
Route::resource('/posts', 'PostController');
Route::resource('/memos', 'MemoController');
Route::get('/contents', 'ContentController@index')->name('contents');
Route::get('/posts', 'PostController@index')->name('posts');

