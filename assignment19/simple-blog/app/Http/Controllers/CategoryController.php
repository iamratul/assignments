<?php

namespace App\Http\Controllers;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getCategoryPosts($id)
    {
        $category = Category::findOrFail($id);
        $posts = $category->posts;

        return view('pages.category_posts', compact('category', 'posts'));
    }
}
