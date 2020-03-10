<?php

namespace App\Http\Controllers;

use App\Product;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index($productId)
    {
        $data = [];
        $data["title"] = "Comments";
        $data["product"] = Product::findOrFail($productId);
        $data["comments"] = Comment::where('product_id', $productId)->get();
        return view('comment.index')->with("data", $data);
    }

    public function show($productId, $commentId)
    {
        $comment = Comment::find($commentId);

        $data = [];
        $data["title"] = "comment ";
        $data["comment"] = $comment;

        return view('comment.show')->with("data", $data);
    }

    public function create($productId)
    {
        $data = [];
        $data["title"] = "Create comment";
        $data["product"] = Product::findOrFail($productId);
        return view('comment.create')->with("data", $data);
    }

    public function store(Request $request, $productId)
    {
        Comment::validate($request);
        $attributes = $request->only(['description']);
        $attributes['product_id'] = $productId;
        Comment::create($attributes);
        return back()->with('success', 'Comment created successfully!');
    }

}
