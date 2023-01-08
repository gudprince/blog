<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;
    
    protected $fillable = [
        'title',
        'description',
        'image',
        'sub_title',
        'user_id',
        'slug',
        'category_id',
        'view_count',
        'menu',
        'published',
    ];

     /**
     * Automatically insert the slug using title column.
    */

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * Get the comments for the blog post.
    */
    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('id', 'DESC');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    
    public function post_views()
    {
        return $this->hasMany(PostView::class);
    }

}
