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
     * @param $resource
     * @param null $search
     * @return mixed
     */
    private function getPosts($resource, $search = null)
    {
        if (!$search) {
            $posts = $resource->posts()->simplePaginate(4);
        } else {
            $posts = $resource
                ->posts()
                ->where('title', 'LIKE', "%{$search}%")
                ->simplePaginate(4);
        }

        return $posts;
    }

    /**
     * @param Category $category
     * @return mixed
     */
    public function category(Category $category)
    {
        $search = request()->query('search');

        $posts = $search ? $this->getPosts($category, $search) : $this->getPosts($category);

        return view('blog.category')
            ->withPosts($posts)
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
        $search = request()->query('search');

        $posts = $search ? $this->getPosts($tag, $search) : $this->getPosts($tag);

        return view('blog.tag')
            ->withPosts($posts)
            ->withCategories(Category::all())
            ->withTags(Tag::all())
            ->withTag($tag);
    }
}
