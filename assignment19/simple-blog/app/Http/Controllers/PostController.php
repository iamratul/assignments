<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

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

        // return view('pages.post', compact('post'));
        return response()->json($post);
    }

    public function postsData()
    {
        $posts = Post::with('categories', 'user')->get();
        return response()->json($posts);
    }

    // function postData(){
    //     $posts = Post::with('categories', 'user')->get();
    //     return response()->json($posts);
    // }

    public function getPost(Request $request)
    {
        // $post = Post::find($postId);
        $post = Post::find($request->id);

        return response()->json($post);
        // return view('pages.post', compact('post'));
        // return view('components.post-page', compact('post'));
    }
}
