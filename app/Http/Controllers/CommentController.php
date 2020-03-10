<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    public function show($commentId)
    {
        $data = []; //to be sent to the view
        $comment = Comment::find($commentId);
        $data["title"] = "comment ";
        $data["comment"] = $comment;
        return view('comment.show')->with("data", $data);
    }

    public function list()
    {
        $data = [];
        $data["title"] = "Comments";
        $data["comments"] = Comment::all();
        return view('comment.list')->with("data", $data);
    }


    public function create()
    {
        $data = [];
        $data["title"] = "Create comment";

        return view('comment.create')->with("data", $data);
    }


    public function store(Request $request)
    {
        Comment::validate($request);
        Comment::create($request->only(["description"]));

        return back()->with('success', 'true');
    }

    public function destroy($commentId)
    {

        Comment::destroy($commentId);

        return redirect()->route('comment.list');
    }
}
