<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = [];
        $data['categories'] = Category::all();

        return view('category.index')->with('data', $data);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        Category::validate($request);
        Category::create($request->only(['name']));

        return back()->with('success', true);
    }
}
