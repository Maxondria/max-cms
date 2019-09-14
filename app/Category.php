<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    /**
     * One category has many posts
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
