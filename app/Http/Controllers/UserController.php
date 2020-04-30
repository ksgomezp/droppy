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

    public function edit($userId)
    {
        return;
    }

    public function update($userId)
    {
        return;
    }

    public function destroy($userId)
    {
        User::destroy($userId);

        return redirect()->route('user.index');
    }
}
