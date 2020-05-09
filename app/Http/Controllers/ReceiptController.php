<?php

namespace App\Http\Controllers;

use App\Receipt;
use Illuminate\Http\Request;


class ReceiptController extends Controller
{

    public function index()
    {
        $data = [];
        $data['receipts'] = Receipt::all();

        return view('receipt.index')->with('data', $data);
    }

    public function show($receiptId)
    {
        $data = [];
        $data['receipt'] = Receipt::with('items')->findOrFail($receiptId);
        $data['totalAmount'] = 0;
        foreach ($data['receipt']->items as $item) {
            $data['totalAmount'] = floatval($data['totalAmount']) + $item->getSubtotal();
        }

        return view('receipt.show')->with('data', $data);
    }

    public function store(Request $request)
    {
        Receipt::create($request->only(['totalAmount']));

        return back();
    }

    public function delete($receiptId)
    {
        Receipt::destroy($receiptId);

        return redirect()->route('home.index');
    }
}
