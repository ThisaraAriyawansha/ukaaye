<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'meta_title', 'meta_description', 'meta_keywords',
        'blog_category_id', 'author_name', 'published_at', 'description',
        'image_path', 'is_active'
    ];

    protected $casts = ['published_at' => 'datetime'];

    /**
     * Returns the correct public URL for the blog image,
     * handling both storage-uploaded files and public asset paths.
     */
    public function getImageUrlAttribute(): string
    {
        if (!$this->image_path) {
            return asset('assets/images/blog/631322687-H.webp');
        }

        // Public assets (assets/images/...)
        if (str_starts_with($this->image_path, 'assets/')) {
            return asset($this->image_path);
        }

        // Storage-uploaded files (blog_img/..., etc.)
        return Storage::url($this->image_path);
    }

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(BlogTag::class, 'blog_tag', 'blog_id', 'blog_tag_id');
    }

    protected static function booted()
    {
        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                $blog->slug = Str::slug($blog->title);
            }
        });

        static::updating(function ($blog) {
            if ($blog->isDirty('title') && empty($blog->slug)) {
                $blog->slug = Str::slug($blog->title);
            }
        });
    }
}