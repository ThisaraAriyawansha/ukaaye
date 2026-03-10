<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'meta_title', 'meta_description', 'meta_keyword',
        'product_category_id', 'description', 'main_img', 'other_img',
        'product_code', 'retail_price', 'discounted_price', 'qty',
        'product_status', 'is_active',
    ];

    protected $casts = [
        'other_img' => 'array',
        'retail_price' => 'decimal:2',
        'discounted_price' => 'decimal:2',
    ];

    public function getMainImgUrlAttribute(): string
    {
        if (!$this->main_img) {
            return asset('assets/images/product/81zLS5Rv18L.jpg');
        }

        if (str_starts_with($this->main_img, 'assets/')) {
            return asset($this->main_img);
        }

        return Storage::url($this->main_img);
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(ProductTag::class, 'product_tag', 'product_id', 'product_tag_id');
    }

    protected static function booted()
    {
        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->title);
            }
        });

        static::updating(function ($product) {
            if ($product->isDirty('title') && empty($product->slug)) {
                $product->slug = Str::slug($product->title);
            }
        });
    }
}
