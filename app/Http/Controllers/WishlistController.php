<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = session('wishlist', []);
        return view('frontend.wishlist.index', compact('wishlist'));
    }

    public function store(Request $request)
    {
        $product  = Product::where('id', $request->product_id)
            ->where('is_active', true)
            ->firstOrFail();

        $wishlist = session('wishlist', []);
        $id       = $product->id;

        if (isset($wishlist[$id])) {
            return response()->json(['success' => false, 'message' => 'Already in wishlist!', 'count' => count($wishlist)]);
        }

        $wishlist[$id] = [
            'id'     => $product->id,
            'title'  => $product->title,
            'price'  => $product->discounted_price ?? $product->retail_price,
            'img'    => $product->main_img_url,
            'slug'   => $product->slug,
            'status' => $product->product_status,
        ];

        session(['wishlist' => $wishlist]);

        return response()->json(['success' => true, 'message' => 'Added to wishlist!', 'count' => count($wishlist)]);
    }

    public function remove($id)
    {
        $wishlist = session('wishlist', []);
        unset($wishlist[$id]);
        session(['wishlist' => $wishlist]);

        return response()->json(['success' => true, 'count' => count($wishlist)]);
    }
}
