<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Comment;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data = [];
        $data['products'] = Product::all();

        return view('product.index')->with('data', $data);
    }

    public function create()
    {
        $data = [];
        $data['categories'] = Category::all();

        return view('product.create')->with('data', $data);
    }

    public function store(Request $request)
    {
        Product::validate($request);
        Product::create($request->all());

        return back()->with('success', 'true');
    }

    public function show($productId)
    {
        $data = [];
        $product = Product::findOrFail($productId);
        $data['product'] = $product;
        $data['category'] = Category::findOrFail($product->getCategoryId());

        return view('product.show')->with('data', $data);
    }

    public function edit($productId)
    {
        $data = [];
        $data['product'] = Product::findOrFail($productId);
        $data['categories'] = Category::all();

        return view('product.edit')->with('data', $data);
    }

    public function update(Request $request, $productId)
    {
        Product::validate($request);
        $product = Product::findOrFail($productId);
        $product->update($request->all());

        return redirect()->route('product.show', $productId);
    }

    public function destroy($productId)
    {
        Comment::where('productId', $productId)->delete();
        Product::destroy($productId);

        return redirect()->route('product.index');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');

        $data = [];
        $data['products'] = Product::where('name', 'like', '%' . $search . '%')->get();

        return view('product.index')->with('data', $data);
    }
}
