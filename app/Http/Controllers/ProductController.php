<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Comment;
use Illuminate\Http\Request;
use App\Interfaces\ImageStorage;

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

        return view('admin.products.create')->with('data', $data);
    }

    public function store(Request $request)
    {
        Product::validate($request);

        $storeInterface = app(ImageStorage::class);
        $storeInterface->store($request);

        $attributes = $request->only(['name', 'description', 'stock', 'price', 'categoryId']);
        $attributes['image'] = $request->file('image')->getClientOriginalName();

        Product::create($attributes);

        return back()->with('success', true);
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
        $attributes = $request->all();

        // If a new image is uploaded set the product's image attribute to match the image's name
        if ($request->hasFile('image')) {
            $storeInterface = app(ImageStorage::class);
            $storeInterface->store($request);

            $attributes = $request->only(['name', 'description', 'stock', 'price', 'categoryId']);
            $attributes['image'] = $request->file('image')->getClientOriginalName();
        }

        $product->update($attributes);

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

    public function mostComments()
    {
    
        $data = [];
        $data['products'] =  Product::withCount('comments')->orderBy('comments_count', 'desc')->take(3)->get();

        return view('product.index')->with('data', $data);
    }

    public function topProducts()
    {
    
        $data = [];
        $data['products'] =  Product::withCount('items')->orderBy('items_count', 'desc')->take(3)->get();
                                

        return view('product.index')->with('data', $data);
    }
}
