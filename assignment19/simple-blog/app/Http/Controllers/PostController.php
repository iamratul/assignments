<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function AllPost()
    {
        $posts = Post::with('categories')->get();
        $categories = Category::all();

        return view('pages.home');
    }

    public function getPost(Request $request)
    {
        $post = Post::find($request->id);

        return view('pages.post');
    }

    public function postsData()
    {
        $posts = Post::with('categories', 'user')->get();
        return response()->json($posts);
    }
}
