<?php

namespace App\Http\Controllers;

use App\Product;
use App\Receipt;
use App\Item;
use App\Address;
use App\City;
use App\State;
use App\Country;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\Payment;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
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

        return view('shoppingCart.index')->with('data', $data);
    }

    public function store(Request $request, $productId)
    {
        $productsId = $request->session()->get('products');

        if ($productsId == null) {
            $productsId = [];
        }

        if (array_search($productId, $productsId) === false) {
            $productsId[] = $productId;
        }

        $request->session()->put('products', $productsId);

        return back()->with('add', true);
    }

    public function destroy(Request $request, $productId)
    {
        $productsId = $request->session()->get('products');

        if (($key = array_search($productId, $productsId)) !== false) {
            unset($productsId[$key]);
        }

        $request->session()->put('products', $productsId);

        return back()->with('remove', true);
    }

    public function review(Request $request)
    {
        $data = [];
        $data['quantities'] = $request->all();
        $data['subtotals'] = [];
        $data['totalAmount'] = 0;
        $data['addresses'] = Address::where('userId', Auth::user()->id)->get();
        $data['cities'] = [];
        $data['states'] = [];
        $data['countries'] = [];
        $data['addressesStr'] = [];

        foreach ($data['addresses'] as $address) {
            $data['cities'][] = City::findOrFail($address->getCityId());
        }

        foreach ($data['cities'] as $city) {
            $data['states'][] = State::findOrFail($city->getStateId());
        }

        foreach ($data['states'] as $state) {
            $data['countries'][] = Country::findOrFail($state->getCountryId());
        }

        $productsId = $request->session()->get('products');

        if ($productsId) {
            foreach ($productsId as $productId) {
                $data['products'][] = Product::findOrFail($productId);
            }
        }

        for ($i = 0; $i < sizeof($data['products']); $i++) {
            $data['subtotals'][] = floatval($data['products'][$i]->getPrice()) * floatval($data['quantities'][$i]);
        }

        for ($i = 0; $i < sizeof($data['cities']); $i++) {
            $data['addressesStr'][] = $data['cities'][$i]->getName() . ', ' . $data['states'][$i]->getName() . ', ' . $data['states'][$i]->getName() . ' - ' . $data['addresses'][$i]->getDeliveryAddress();
        }

        foreach ($data['subtotals'] as $subtotal) {
            $data['totalAmount'] = floatval($data['totalAmount']) + $subtotal;
        }
        $json = json_encode($data);
        $data['json'] = $json;

        return view('shoppingCart.review')->with('data', $data);
    }

    public function buy(Request $request)
    {
        $attributes = $request->all();

        $data = json_decode($attributes['data'], true);

        $request['userId'] = Auth::user()->id;
        $request['totalAmount'] = $data['totalAmount'];
        $paymentInterface = app(Payment::class);
        $paymentStatus = $paymentInterface->pay($data['totalAmount']);

        if ($paymentStatus) {
            Receipt::validate($request);
            $receipt = Receipt::create($request->all());


            for ($i = 0; $i < sizeof($data['products']); $i++) {
                $item = new Item();
                $item->setQuantity($data['quantities'][$i]);
                $item->setSubtotal($data['subtotals'][$i]);
                $item->setProductId($data['products'][$i]['id']);
                $item->setReceiptId($receipt->getId());
                $item->save();

                $product = Product::findOrFail($data['products'][$i]['id']);
                $product->setStock($product->getStock() - $data['quantities'][$i]);
                $product->save();
                $request->session()->forget('products');
            }

            return redirect()->route('home.index')->with('successfulPurchase', true);
        } else {
            return redirect()->route('shoppingCart.index')->with('paymentError', true);
        }
    }
}
