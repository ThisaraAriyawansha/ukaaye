<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'position', 'message', 'image_path', 'is_active', 'star_count',
    ];

    public function getImageUrlAttribute(): string
    {
        if (!$this->image_path) {
            return asset('assets/images/thumbnails/564654.webp');
        }

        if (str_starts_with($this->image_path, 'assets/')) {
            return asset($this->image_path);
        }

        return Storage::url($this->image_path);
    }
}
