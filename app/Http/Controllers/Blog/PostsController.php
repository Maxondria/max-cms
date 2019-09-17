<?php

namespace App\Http\Controllers\Blog;

use App\Category;
use App\Post;
use App\Tag;

use App\Http\Controllers\Controller;


class PostsController extends Controller
{
    public function show(Post $post)
    {
        return view('blog.show')->withPost($post);
    }

    /**
     * @param Category $category
     * @return mixed
     */
    public function category(Category $category)
    {
        return view('blog.category')
            ->withPosts($category->posts()->searched()->simplePaginate(4))
            ->withCategories(Category::all())
            ->withTags(Tag::all())
            ->withCategory($category);
    }

    /**
     * @param Tag $tag
     * @return mixed
     */
    public function tag(Tag $tag)
    {
        return view('blog.tag')
            ->withPosts($tag->posts()->searched()->simplePaginate(4))
            ->withCategories(Category::all())
            ->withTags(Tag::all())
            ->withTag($tag);
    }
}
