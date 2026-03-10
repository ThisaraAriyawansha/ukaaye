<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestBlogs = Blog::where('is_active', true)
            ->with('category')
            ->latest('published_at')
            ->take(3)
            ->get();

        $homeGalleries = Gallery::where('is_active', true)->take(5)->get();

        $homeTestimonials = Testimonial::where('is_active', true)->take(4)->get();

        return view('frontend.home.index', compact('latestBlogs', 'homeGalleries', 'homeTestimonials'));
    }
}
