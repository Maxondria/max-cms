<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;

class  WelcomeController extends Controller
{
    public function index()
    {
        $search = request()->query('search');
        if ($search) {
            $posts = Post::where('title', 'LIKE', "%{$search}%")->simplePaginate(4);
        } else {
            $posts = Post::simplePaginate(4);
        }

        return view('welcome')
            ->withPosts($posts)
            ->withCategories(Category::all())
            ->withTags(Tag::all());
    }
}

