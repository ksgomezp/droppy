<?php

namespace App\Http\Controllers;

use App\Item;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $catidades= $request->all();
        dd($catidades);
        $data = [];

        // return view('address.index')->with('data', $data);
    }
}
