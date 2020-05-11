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

        return view('admin.users.index')->with('data', $data);
    }

    public function show($userId)
    {
        $data = [];
        $data['user'] = User::findOrFail($userId);

        return view('admin.users.show')->with('data', $data);
    }

    public function update($userId)
    {
        $data = [];
        $data['user'] = User::findOrFail($userId);
        return view('admin.users.update')->with('data', $data);
    }

    public function destroy($userId)
    {
        User::destroy($userId);

        return redirect()->route('admin.users.index');
    }

    public function store(Request $request)
    {
        //
    }
}
