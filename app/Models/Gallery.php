<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'category_name', 'image_path', 'is_active',
    ];

    public function getImageUrlAttribute(): string
    {
        if (!$this->image_path) {
            return asset('assets/images/gallery/563543.jpg');
        }

        if (str_starts_with($this->image_path, 'assets/')) {
            return asset($this->image_path);
        }

        return Storage::url($this->image_path);
    }
}
