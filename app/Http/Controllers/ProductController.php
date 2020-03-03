<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index')->with("products", $products);
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        Product::validate($request);
        Product::create($request->only(["name", "description", "category", "stock", "price"]));
        return back()->with('success', 'Product created successfully!');
    }

    public function show($productId)
    {
//        $product = Product::findOrFail($productId);
        $product = Product::with('comments')->where('id', $productId)->get();
        return view('product.show')->with("product", $product);
    }

    public function edit($productId)
    {
        return;
    }

    public function update($productId)
    {
        return;
    }

    public function destroy($productId)
    {
        Product::destroy($productId);
        return redirect()->route('product.index');
    }
}
