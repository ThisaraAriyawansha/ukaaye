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
            return asset('assets/img/testimonials/456453476.jpg');
        }

        $normalized = str_replace('\\', '/', ltrim($this->image_path, '\\/'));

        if (str_starts_with($normalized, 'assets/')) {
            return asset($normalized);
        }

        return Storage::url($this->image_path);
    }
}
