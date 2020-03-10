<?php

namespace App\Http\Controllers;

use App\Receipt;
use Illuminate\Http\Request;


class ReceiptController extends Controller
{
    public function show($receiptId)
    {
        $data = []; //to be sent to the view
        $receipt = Receipt::find($receiptId);
        $data["title"] = "Receipt ";
        $data["receipt"] = $receipt;
        return view('receipt.show')->with("data", $data);
    }

    public function store(Request $request)
    {
        Receipt::create($request->only(["totalAmount"]));

        return back();
    }

    public function delete($receiptId)
    {

        Receipt::destroy($receiptId);
        return redirect()->route('home.index');
    }
}
