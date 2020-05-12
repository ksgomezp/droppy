<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = [];
        $data['users'] = User::all();

        return view('user.index')->with('data', $data);
    }


    public function show($userId)
    {
        $data = [];
        $data['user'] = User::findOrFail($userId);

        return view('user.show')->with('data', $data);
    }

    public function buyers($userId)
    {
        $data = [];
        $data['user'] =  User::withCount('receipts')->orderBy('receipts_count', 'desc')->take(3)->get();

        return view('user.buyers')->with('data', $data);
    }

    public function edit(Request $request, $userId)
    {
        User::validateEdit($request);

        $user = User::findOrFail($userId);
        $attributes = $request->all();

        $user->update($attributes);

        return redirect()->route('user.show', $userId);
    }

    public function update($userId)
    {
        $data = [];
        $data['user'] = User::findOrFail($userId);
        return view('user.update')->with('data', $data);
    }


    public function destroy($userId)
    {
        User::destroy($userId);

        return redirect()->route('user.index');
    }
}
