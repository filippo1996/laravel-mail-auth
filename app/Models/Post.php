<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'category_id'
    ];

    /**
     * Get the category that owns the post.
     */
    public function category(){
        return $this->belongsTo(Category::class);
    }

    /**
     * The posts that belong to the tags.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


    /**
     * Get the route key for the model.
     *
     * @return string
     */
    /*
    public function getRouteKeyName()
    {
        return 'slug';
    }
    */
}
