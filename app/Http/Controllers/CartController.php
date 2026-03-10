<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        return view('frontend.cart.index', compact('cart'));
    }

    public function store(Request $request)
    {
        $product = Product::where('id', $request->product_id)
            ->where('is_active', true)
            ->firstOrFail();

        // Stock check
        if ($product->product_status !== 'in_stock' || $product->qty <= 0) {
            return response()->json(['success' => false, 'message' => 'This product is out of stock.']);
        }

        $cart        = session('cart', []);
        $id          = $product->id;
        $requestedQty = max(1, (int) $request->input('qty', 1));
        $inCartQty   = isset($cart[$id]) ? $cart[$id]['qty'] : 0;
        $totalQty    = $inCartQty + $requestedQty;

        // Cap at available stock
        if ($totalQty > $product->qty) {
            if ($inCartQty >= $product->qty) {
                return response()->json(['success' => false, 'message' => 'You already have the maximum available stock in your cart.']);
            }
            $requestedQty = $product->qty - $inCartQty;
        }

        if (isset($cart[$id])) {
            $cart[$id]['qty'] += $requestedQty;
        } else {
            $cart[$id] = [
                'id'    => $product->id,
                'title' => $product->title,
                'price' => $product->discounted_price ?? $product->retail_price,
                'img'   => $product->main_img_url,
                'qty'   => $requestedQty,
                'slug'  => $product->slug,
            ];
        }

        session(['cart' => $cart]);

        $message = $totalQty > $product->qty
            ? 'Added ' . $requestedQty . ' item(s) — only ' . $product->qty . ' in stock.'
            : 'Added to cart!';

        return response()->json(['success' => true, 'message' => $message, 'count' => count($cart)]);
    }

    public function update(Request $request, $id)
    {
        $cart    = session('cart', []);
        $qty     = max(1, (int) $request->qty);
        $product = Product::find($id);

        if (isset($cart[$id])) {
            if ($product && $qty > $product->qty) {
                $qty = $product->qty;
            }
            $cart[$id]['qty'] = $qty;
            session(['cart' => $cart]);
        }

        return response()->json(['success' => true, 'qty' => $qty]);
    }

    public function remove($id)
    {
        $cart = session('cart', []);
        unset($cart[$id]);
        session(['cart' => $cart]);

        return response()->json(['success' => true, 'count' => count($cart)]);
    }
}
