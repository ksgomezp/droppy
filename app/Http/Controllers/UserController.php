<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index')->with("users", $users);
    }


    public function show($userId)
    {
       $user = User::findOrFail($userId);
        // $product = Product::with('comments')->where('id', $productId)->get();
        return view('user.show')->with("user", $user);
    }

    public function edit($productId)
    {
        return;
    }

    public function update($productId)
    {
        return;
    }

    public function destroy($userId)
    {
        User::destroy($userId);
        return redirect()->route('user.index');
    }
}
