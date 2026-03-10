<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

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

        $blogs = $query->paginate(9);

        return view('frontend.blog.index', compact('blogs'));
    }

    public function blogdetails()
    {
        return view('frontend.blogdetails.index');
    }
}
