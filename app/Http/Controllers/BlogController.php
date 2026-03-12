<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTag;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::where('is_active', true)->with('category')->latest('published_at');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(fn($q) => $q->where('title', 'like', "%{$search}%")
                                       ->orWhere('description', 'like', "%{$search}%"));
        }

        if ($request->filled('category')) {
            $query->whereHas('category', fn($q) => $q->where('slug', $request->category));
        }

        if ($request->filled('tag')) {
            $query->whereHas('tags', fn($q) => $q->where('slug', $request->tag));
        }

        $blogs      = $query->paginate(9)->withQueryString();
        $categories = BlogCategory::where('is_active', true)
                        ->withCount(['blogs' => fn($q) => $q->where('is_active', true)])
                        ->get();
        $allTags    = BlogTag::where('is_active', true)->get();

        return view('frontend.blog.index', compact('blogs', 'categories', 'allTags'));
    }

    public function blogdetails()
    {
        return view('frontend.blogdetails.index');
    }
}