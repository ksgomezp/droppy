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


Route::get('/comment/show/{id}', 'CommentController@show')->name("comment.show");
Route::get('/comment/list', 'CommentController@list')->name("comment.list");
Route::get('/comment/create', 'CommentController@create')->name("comment.create");
Route::post('/comment/save', 'CommentController@save')->name("comment.save");
Route::delete('comment/{commentId}', 'CommentController@destroy')->name("comment.destroy");

Route::get('/', 'HomeController@index')->name('home.index');

Route::get('products', 'ProductController@index')->name('product.index');
Route::get('products/create', 'ProductController@create')->name('product.create');
Route::post('products', 'ProductController@store')->name('product.store');
Route::get('products/{productId}', 'ProductController@show')->name('product.show');
Route::get('products/{productId}/edit', 'ProductController@edit')->name('product.edit');
Route::patch('products/{productId}', 'ProductController@update')->name('product.update');
Route::delete('products/{productId}', 'ProductController@destroy')->name('product.destroy');
