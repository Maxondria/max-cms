<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'description', 'content', 'image', 'published_at','category_id'];

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
}
