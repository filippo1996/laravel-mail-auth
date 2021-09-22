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
        $driver = env('FILESYSTEM_DRIVER');
        $imgDefault = 'covers/cover-placeholder.jpeg';

        if(Storage::disk($driver)->exists($value)){
            $value = Storage::disk($driver)->url($value);
        } else {
            $value = Storage::disk($driver)->url($imgDefault);
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
