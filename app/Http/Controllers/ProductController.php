<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductTag;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::where('is_active', true)->with(['category', 'tags']);

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->whereHas('category', fn($q) => $q->where('slug', $request->category));
        }

        if ($request->filled('tag')) {
            $query->whereHas('tags', fn($q) => $q->where('slug', $request->tag));
        }

        $products   = $query->paginate(12);
        $categories = ProductCategory::where('is_active', true)
            ->withCount(['products' => fn($q) => $q->where('is_active', true)])
            ->get();
        $tags       = ProductTag::where('is_active', true)->get();

        return view('frontend.product.index', compact('products', 'categories', 'tags'));
    }
}