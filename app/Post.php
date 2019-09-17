<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title', 'description', 'content', 'image', 'published_at', 'category_id', 'tags', 'user_id'
    ];

    protected $dates = ['published_at'];

    /**
     * Helper method to delete image from storage if nolonger needed
     * @return void
     */
    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    /**
     * Post belongs to a category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Checks to see if the post has tags
     *
     * @param $tag_id
     * @return bool
     */
    public function hasTag($tag_id)
    {
        return in_array($tag_id, $this->tags->pluck('id')->toArray());
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeSearched($query)
    {
        $search = request()->query('search');

        if (!$search) {
            return $query->published();
        }

        return $query->published()->where('title', 'LIKE', "%{$search}%");
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now());
    }
}
