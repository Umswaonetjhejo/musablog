<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Set mass-assignable fields
    protected $fillable = array('title', 'content', 'category', 'slug', 'user_id');

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
