@extends('layouts.frontend')

@section('body-class', 'inner-page')

@section('content')


<section style="background-image: url(assets/img/home/photo-1526666923127-b2970f64b422.jpg);" class="bannr">
  <div class="container">
    <div class="bannr-text">
      <h2>Order Placed Successfully!</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('home') }}"><i class="fa-solid fa-house"></i> Home</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Order Placed</li>
      </ol>
    </div>
  </div>
</section>


<section style="padding: 80px 0 120px; background: #fafafa;">
    <div class="container">
        <div style="max-width: 600px; margin: 0 auto; background: #fff; border-radius: 16px; padding: 50px 40px; text-align: center;">

            <div style="width:72px; height:72px; background:var(--primary-color); border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 24px; box-shadow:0 6px 20px rgba(0,0,0,.15);">
                <svg width="36" height="36" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
            </div>

            <h2 style="font-family:'Mulish',sans-serif; font-size:24px; font-weight:800; color:var(--primary-color); margin:0 0 10px;">Order Placed Successfully!</h2>
            <p style="font-family:'Mulish',sans-serif; color:#888; font-size:14px; margin:0 0 28px;">
                Thank you, <strong>{{ $order->first_name }}</strong>! We've received your order and will process it shortly.
            </p>

            <div style="background:#fafafa; border:1px solid #e8e8e8; border-radius:10px; padding:18px 24px; margin-bottom:28px; text-align:left;">
                <div style="display:flex; justify-content:space-between; align-items:center; padding-bottom:10px; border-bottom:1px solid #f0f0f0; margin-bottom:10px;">
                    <span style="font-family:'Mulish',sans-serif; font-size:12px; color:#aaa; text-transform:uppercase; letter-spacing:.05em;">Order Code</span>
                    <span style="font-family:'Mulish',sans-serif; font-size:15px; font-weight:800; color:var(--primary-color); letter-spacing:2px;">{{ $order->order_code }}</span>
                </div>
                <div style="display:flex; justify-content:space-between; align-items:center; padding-bottom:10px; border-bottom:1px solid #f0f0f0; margin-bottom:10px;">
                    <span style="font-family:'Mulish',sans-serif; font-size:12px; color:#aaa; text-transform:uppercase; letter-spacing:.05em;">Total</span>
                    <span style="font-family:'Mulish',sans-serif; font-size:15px; font-weight:800; color:var(--primary-color);">LKR {{ number_format($order->total, 2) }}</span>
                </div>
                <div style="display:flex; justify-content:space-between; align-items:center;">
                    <span style="font-family:'Mulish',sans-serif; font-size:12px; color:#aaa; text-transform:uppercase; letter-spacing:.05em;">Payment</span>
                    <span style="font-family:'Mulish',sans-serif; font-size:13px; font-weight:600; color:#555;">{{ str_replace('_', ' ', ucwords($order->payment_type, '_')) }}</span>
                </div>
            </div>

            <p style="font-family:'Mulish',sans-serif; color:#aaa; font-size:13px; margin:0 0 28px;">
                A confirmation email has been sent to <strong style="color:#555;">{{ $order->email }}</strong>.
            </p>

            <a href="{{ route('products') }}" class="success-btn" style="display:inline-block; padding:14px 36px; background:var(--primary-color); color:#fff; border-radius:9px; font-family:'Mulish',sans-serif; font-size:13px; font-weight:800; text-transform:uppercase; letter-spacing:.08em; text-decoration:none; box-shadow:0 4px 14px rgba(0,0,0,.18); transition:transform .2s, box-shadow .2s, filter .2s;">
                Continue Shopping
            </a>
            <style>.success-btn:hover { transform:translateY(-2px); box-shadow:0 8px 24px rgba(0,0,0,.28); filter:brightness(1.08); }</style>
        </div>
    </div>
</section>
@endsection
