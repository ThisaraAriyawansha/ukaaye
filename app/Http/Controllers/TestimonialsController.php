<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::where('is_active', true)->get();

        return view('frontend.testimonials.index', compact('testimonials'));
    }
}
