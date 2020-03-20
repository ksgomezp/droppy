<?php

namespace App\Http\Controllers;

use App\Address;
use App\User;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index($userId)
    {
        $data = [];
        $data["user"] = User::findOrFail($userId);
        $data["addresses"] = Address::where('userId', $userId)->get();

        return view('address.index')->with("data", $data);
    }


    public function create($userId)
    {
        $data = [];
        $data["user"] = User::findOrFail($userId);

        return view('address.create')->with("data", $data);
    }

    public function store(Request $request, $userId)
    {
        Address::validate($request);
        $attributes = $request->only(['country', 'state', 'city', 'deliveryAddress', 'postalCode']);
        $attributes['userId'] = $userId;
        Address::create($attributes);

        return back()->with('success', 'true');
    }
}
