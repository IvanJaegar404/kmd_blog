<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $years = Post::selectRaw('YEAR(published_at) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        return view('posts.index', [
            'featuredPosts' => Post::published()->featured()->latest('featured')->take(3)->get(),
            'categories' => Category::whereHas('posts', function ($query) {
                $query->published();
            })->take(10)->get(),
            'years' => $years
        ]);
    }

    public function show(Post $post)
    { //$post should be the same name as route in web.php
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
