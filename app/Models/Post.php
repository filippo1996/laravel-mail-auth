<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'category_id',
        'cover'
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
     * get Path attribute cover img
     */
    public function getCoverAttribute($value)
    {

        if(Storage::disk('public')->exists($value)){
            $value = Storage::disk('public')->url($value);
        } else {
            $value = Storage::disk('public')->url('covers/cover-placeholder.jpeg');
        }
        
        return $value;
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
