<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Products API V1
Route::get('v1/products', 'Api\ProductApiV1@index')->name('api.v1.product.index');
Route::get('v1/products/{productId}', 'Api\ProductApiV1@show')->name('api.v1.product.show');
