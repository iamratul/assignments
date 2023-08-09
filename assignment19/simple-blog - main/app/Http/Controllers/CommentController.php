<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|string',
        ]);

        Comment::create([
            'post_id' => $request->post_id,
            'content' => $request->content,
            'user_id' => $request->user_id,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
}
