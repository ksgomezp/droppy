<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProductV1 as ProductV1Resource;
use App\Http\Controllers\Controller;
use App\Product;

class ProductApiV1 extends Controller
{
    public function index()
    {
        return ProductV1Resource::collection(Product::all());
    }

    public function show($productId)
    {
        return new ProductV1Resource(Product::findOrFail($productId));
    }
}
