<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->get();
        $categories = Category::all();

        return view('pages.posts', ['posts' => $posts], compact('categories'));
    }
}
