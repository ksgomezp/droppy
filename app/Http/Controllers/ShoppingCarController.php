<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ShoppingCarController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['products'] = [];
        $productsId = $request->session()->get('products');
        if ($productsId) {
            foreach ($productsId as $productId) {
                $data['products'][] = Product::findOrFail($productId);
            }
        }

        return view('shoppingCar.index')->with('data', $data);
    }

    public function save(Request $request, $productId)
    {
        $productsId = $request->session()->get('products');
        if (array_search($productId, $productsId) === false) {
            $productsId[] = $productId;
        }

        $request->session()->put('products', $productsId);

        return back()->with('add', true);
    }

    public function delete(Request $request, $productId)
    {
        $productsId = $request->session()->get('products');
        if (($key = array_search($productId, $productsId)) !== false) {
            unset($productsId[$key]);
        }
        $request->session()->put('products', $productsId);
        return back();
    }
}
