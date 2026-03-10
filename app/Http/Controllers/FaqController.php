<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {   
        $latestBlogs = Blog::where('is_active', true)
            ->with('category')
            ->latest('published_at')
            ->take(3)
            ->get();
            
        $faqs = Faq::where('status', true)
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('frontend.faq.index', compact('latestBlogs', 'faqs'));
    }
}