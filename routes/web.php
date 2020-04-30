<?php

// Home
Route::get('/', 'HomeController@index')->name('home.index');

// Users
Route::get('users', 'UserController@index')->name('user.index');
Route::get('users/{userId}', 'UserController@show')->name('user.show');
Route::get('users/buyers/{userId}', 'UserController@buyers')->name('user.buyers');
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
Route::get('mostComments', 'ProductController@mostComments')->name('product.mostComments');
Route::get('topProducts', 'ProductController@topProducts')->name('product.topProducts');

// Categories
Route::get('categories', 'CategoryController@index')->name('category.index');
Route::get('categories/create', 'CategoryController@create')->name('category.create');
Route::post('categories', 'CategoryController@store')->name('category.store');

// Comments
Route::get('products/{productId}/comments', 'CommentController@index')->name("comment.index");
Route::get('products/{productId}/comments/create', 'CommentController@create')->name("comment.create");
Route::post('products/{productId}/comments', 'CommentController@store')->name("comment.store");

// Addresses
Route::get('users/{userId}/addresses', 'AddressController@index')->name("address.index");
Route::get('users/{userId}/addresses/create', 'AddressController@create')->name("address.create");
Route::post('users/{userId}/addresses', 'AddressController@store')->name("address.store");
