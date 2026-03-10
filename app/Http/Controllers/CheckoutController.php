<?php

namespace App\Http\Controllers;

use App\Mail\AdminOrderMail;
use App\Mail\CustomerOrderMail;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Your cart is empty. Add items before checking out.');
        }

        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['qty']);
        $shipping = 200;
        $total    = $subtotal + $shipping;

        return view('frontend.checkout.index', compact('cart', 'subtotal', 'shipping', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name'   => 'required|string|max:100',
            'last_name'    => 'required|string|max:100',
            'town'         => 'required|string|max:100',
            'address'      => 'required|string|max:255',
            'state'        => 'required|string|max:100',
            'zip'          => 'required|string|max:20',
            'phone'        => 'required|string|max:20',
            'email'        => 'required|email|max:255',
            'payment_type' => 'required|string',
        ]);

        $cart = session('cart', []);

        if (empty($cart)) {
            return back()->with('error', 'Your cart is empty.');
        }

        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['qty']);
        $shipping = 200;
        $total    = $subtotal + $shipping;

        // Generate unique order code
        do {
            $orderCode = 'ARO-' . strtoupper(Str::random(8));
        } while (Order::where('order_code', $orderCode)->exists());

        $order = Order::create([
            'order_code'   => $orderCode,
            'first_name'   => $request->first_name,
            'last_name'    => $request->last_name,
            'town'         => $request->town,
            'address'      => $request->address,
            'state'        => $request->state,
            'zip'          => $request->zip,
            'phone'        => $request->phone,
            'email'        => $request->email,
            'notes'        => $request->notes,
            'subtotal'     => $subtotal,
            'shipping'     => $shipping,
            'payment_type' => $request->payment_type,
            'total'        => $total,
            'status'       => 'pending',
        ]);

        foreach ($cart as $item) {
            $order->items()->create([
                'product_id' => $item['id'],
                'title'      => $item['title'],
                'price'      => $item['price'],
                'qty'        => $item['qty'],
                'subtotal'   => $item['price'] * $item['qty'],
            ]);

            // Deduct stock
            Product::where('id', $item['id'])->decrement('qty', $item['qty']);
        }

        // Clear cart
        session()->forget('cart');

        // Send emails
        try {
            Mail::to($order->email)->send(new CustomerOrderMail($order));
            Mail::to(env('ADMIN_EMAIL'))->send(new AdminOrderMail($order));
        } catch (\Exception $e) {
            // Silently fail — order is already saved
        }

        return redirect('/order-success?code=' . $order->order_code);
    }

}
