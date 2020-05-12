<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
     
    public function index()
    {
        $data = [];
        $data['users'] = User::all();

        return view('admin.user.index')->with('data', $data);
    }

    public function show($userId)
    {
        $data = [];
        $data['user'] = User::findOrFail($userId);

        return view('admin.user.show')->with('data', $data);
    }

    public function edit(Request $request, $userId)
    {
        User::validateEdit($request);

        $user = User::findOrFail($userId);
        $attributes = $request->all();

        // If a new image is uploaded set the product's image attribute to match the image's name
        /*if ($request->hasFile('image')) {
            $storeInterface = app(ImageStorage::class);
            $storeInterface->store($request);

            $attributes = $request->only(['name', 'description', 'stock', 'price', 'categoryId']);
            $attributes['image'] = $request->file('image')->getClientOriginalName();
        }
        */
        $user->update($attributes);

        return redirect()->route('user.show', $userId);
    }

    public function update($userId)
    {
        $data = [];
        $data['user'] = User::findOrFail($userId);
        return view('admin.user.update')->with('data', $data);
    }

    public function destroy($userId)
    {
        User::destroy($userId);

        return redirect()->route('admin.user.index');
    }

    public function buyer()
    {
        $data = [];

        $wallets = User::all();
        $minval = 110000;
        $bestBuyer = null;

        foreach ($wallets as $wallet) {
            /*if ($wallet < $minval) {
                $minval = $wallet;              
            }*/
            $bestBuyer = $wallet;
        }
        
        $data['users'] = $wallets;

        return view('admin.user.index')->with('data', $data);
    }
}
