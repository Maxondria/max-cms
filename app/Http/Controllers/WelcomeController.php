<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;

class  WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome')
            ->withPosts(Post::searched()->simplePaginate(4))
            ->withCategories(Category::all())
            ->withTags(Tag::all());
    }
}

