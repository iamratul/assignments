<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('categories')->get();
        $categories = Category::all();

        return view('pages.home', compact('posts', 'categories'));
    }

    public function show($postId)
    {
        $post = Post::with('user')->findOrFail($postId);

        return view('pages.post', compact('post'));
    }

    public function postsData()
    {
        $posts = Post::with('categories', 'user')->get();
        return response()->json($posts);
    }

    function postData(){
        $posts = Post::with('categories', 'user')->get();
        return response()->json($posts);
    }
}
