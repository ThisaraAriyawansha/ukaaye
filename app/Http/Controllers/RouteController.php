<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductTag;
use App\Models\Service;

class RouteController extends Controller
{
    public function resolve(Request $request, $slug): View
    {
        // Order success page
        if ($slug === 'order-success') {
            $order = Order::where('order_code', $request->query('code'))->firstOrFail();
            return view('frontend.checkout.success', compact('order'));
        }

        // Check if it's a service
        $service = Service::where('slug', $slug)
                          ->where('is_public', true)
                          ->first();

        if ($service) {
            $otherServices = Service::where('is_public', true)
                ->where('id', '!=', $service->id)
                ->take(4)
                ->get();

            return view('frontend.servicedetails.index', compact('service', 'otherServices'));
        }

        // Check if it's a product
        $product = Product::where('slug', $slug)
                          ->where('is_active', true)
                          ->with(['category', 'tags'])
                          ->first();

        if ($product) {
            $relatedProducts = Product::where('is_active', true)
                ->where('id', '!=', $product->id)
                ->where('product_category_id', $product->product_category_id)
                ->inRandomOrder()
                ->take(4)
                ->get();

            $categories = ProductCategory::where('is_active', true)
                ->withCount(['products' => fn($q) => $q->where('is_active', true)])
                ->get();

            $tags = ProductTag::where('is_active', true)->get();

            return view('frontend.productdetails.index', [
                'product'         => $product,
                'relatedProducts' => $relatedProducts,
                'categories'      => $categories,
                'tags'            => $tags,
            ]);
        }

        // Check if it's a blog
        $blog = Blog::where('slug', $slug)
                   ->where('is_active', true)
                   ->with(['category', 'tags'])
                   ->first();

        if ($blog) {
            $relatedBlogs = Blog::where('is_active', true)
                               ->where('id', '!=', $blog->id)
                               ->inRandomOrder()
                               ->take(3)
                               ->get();

            $categories = BlogCategory::where('is_active', true)
                ->withCount(['blogs' => fn($q) => $q->where('is_active', true)])
                ->get();

            $recentPosts = Blog::where('is_active', true)
                ->where('id', '!=', $blog->id)
                ->latest('published_at')
                ->take(3)
                ->get();

            $allTags = BlogTag::where('is_active', true)->get();

            return view('frontend.blogdetails.index', [
                'blog'         => $blog,
                'relatedBlogs' => $relatedBlogs,
                'categories'   => $categories,
                'recentPosts'  => $recentPosts,
                'allTags'      => $allTags,
            ]);
        }

        abort(404, "Page not found");
    }
}