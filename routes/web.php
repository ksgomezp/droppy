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

//Route::get('/', 'HomeController@index')->name("home.index");

Route::get('/index', 'HomeController@index')->name("home.index");
Route::get('/comment/show/{id}', 'CommentController@show')->name("comment.show");
Route::get('/comment/list', 'CommentController@list')->name("comment.list");

Route::get('/comment/create', 'CommentController@create')->name("comment.create");
Route::post('/comment/save', 'CommentController@save')->name("comment.save");
Route::get('/comment/delete/{id}', 'CommentController@delete')->name("comment.delete");
