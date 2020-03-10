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

// Home
Route::get('/', 'HomeController@index')->name('home.index');

// Users
Route::get('users', 'UserController@index')->name('user.index');
Route::get('users/{userId}', 'UserController@show')->name('user.show');
Route::delete('users/{userId}', 'UserController@destroy')->name('user.destroy');
Auth::routes();

// Products
Route::get('products', 'ProductController@index')->name('product.index');
Route::get('products/create', 'ProductController@create')->name('product.create');
Route::post('products', 'ProductController@store')->name('product.store');
Route::get('products/{productId}', 'ProductController@show')->name('product.show');
Route::get('products/{productId}/edit', 'ProductController@edit')->name('product.edit');
Route::patch('products/{productId}', 'ProductController@update')->name('product.update');
Route::delete('products/{productId}', 'ProductController@destroy')->name('product.destroy');
Route::get('search', 'ProductController@search')->name('product.search');

// Comments
Route::get('products/{productId}/comments', 'CommentController@index')->name("comment.index");
Route::get('products/{productId}/comments/create', 'CommentController@create')->name("comment.create");
Route::post('products/{productId}/comments', 'CommentController@store')->name("comment.store");
Route::get('products/{productId}/comments/{commentId}', 'CommentController@show')->name("comment.show");
