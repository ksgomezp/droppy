<?php

namespace App\Http\Controllers;
use App\Receipt;
use Illuminate\Http\Request;


class ReceiptController extends Controller
{
  public function show($id)
    {
        $data = []; //to be sent to the view
        $receipt = Receipt::find($id);
        $data["title"] = "Receipt ";
        $data["receipt"] = $receipt;
        return view('receipt.show')->with("data",$data);
    }

public function store(Request $request)
    {
        Comment::create($request->only(["totalAmount"]));

        return back();
    }

public function delete($id)
        {

           $comment = Receipt::find($id);
           $comment->delete();

            return redirect()->route('home.index');
        }

}
