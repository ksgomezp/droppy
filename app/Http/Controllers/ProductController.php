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
        return back()->with('success', 'true');
    }

    public function show($productId)
    {
        $product = Product::findOrFail($productId);
        // $product = Product::with('comments')->where('id', $productId)->get();
        return view('product.show')->with("product", $product);
    }

    public function edit($productId)
    {
        $product = Product::findOrFail($productId);
        return view('product.edit')->with('product', $product);
    }

    public function update(Request $request, $productId)
    {
        Product::validate($request);
        $product = Product::findOrFail($productId);
        $product->update($request->all());
        return redirect()->route('product.index');
    }

    public function destroy($productId)
    {
        Product::destroy($productId);
        return redirect()->route('product.index');
    }
}
