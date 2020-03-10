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
        return view('user.show')->with("user", $user);
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
