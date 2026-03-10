@extends('layouts.frontend')

@section('body-class', 'inner-page')

@section('content')

            <section class="tf-page-title">
                <div class="overlay"></div>
                <div class="overlay-bg"></div>
                <img src="assets/images/background/img2innerpage.png" class="bg-inner2" alt="">
                <img src="assets/images/background/img3innerpage.png" class="bg-inner3" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title inner">
                                <h1 class="title">Order Placed Successfully!</h1>
                                <div class="breadcrumbs">
                                    <ul class="jus-ct">
                                        <li><a href="{{ route('home') }}" class="f-rubik">Home</a></li>
                                        <li><p class="breadcrumbs-inner f-rubik">Checkout</p></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </section>


<section style="padding: 80px 0 120px; background: #fafafa;">
    <div class="container">
        <div style="max-width: 600px; margin: 0 auto; background: #fff; border-radius: 16px; padding: 50px 40px; text-align: center;">

            <div style="width: 72px; height: 72px; background: #e8f5e9; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px;">
                <svg width="36" height="36" fill="none" viewBox="0 0 24 24" stroke="#2e7d32" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
            </div>

            <h2 style="font-family:'Mulish',sans-serif; font-size:24px; font-weight:800; color:#1a1a2e; margin:0 0 10px;">Order Placed Successfully!</h2>
            <p style="font-family:'Mulish',sans-serif; color:#888; font-size:14px; margin:0 0 28px;">
                Thank you, <strong>{{ $order->first_name }}</strong>! We've received your order and will process it shortly.
            </p>

            <div style="background:#fafafa; border-radius:10px; padding:18px 24px; margin-bottom:28px; text-align:left;">
                <div style="display:flex; justify-content:space-between; margin-bottom:10px;">
                    <span style="font-family:'Mulish',sans-serif; font-size:12px; color:#aaa; text-transform:uppercase; letter-spacing:.05em;">Order Code</span>
                    <span style="font-family:'Mulish',sans-serif; font-size:15px; font-weight:800; color:#ff5a5f; letter-spacing:2px;">{{ $order->order_code }}</span>
                </div>
                <div style="display:flex; justify-content:space-between; margin-bottom:10px;">
                    <span style="font-family:'Mulish',sans-serif; font-size:12px; color:#aaa; text-transform:uppercase; letter-spacing:.05em;">Total</span>
                    <span style="font-family:'Mulish',sans-serif; font-size:15px; font-weight:700; color:#1a1a2e;">LKR {{ number_format($order->total, 2) }}</span>
                </div>
                <div style="display:flex; justify-content:space-between;">
                    <span style="font-family:'Mulish',sans-serif; font-size:12px; color:#aaa; text-transform:uppercase; letter-spacing:.05em;">Payment</span>
                    <span style="font-family:'Mulish',sans-serif; font-size:13px; font-weight:600; color:#555;">{{ str_replace('_', ' ', ucwords($order->payment_type, '_')) }}</span>
                </div>
            </div>

            <p style="font-family:'Mulish',sans-serif; color:#aaa; font-size:13px; margin:0 0 28px;">
                A confirmation email has been sent to <strong>{{ $order->email }}</strong>.
            </p>

            <a href="{{ route('products') }}" style="display:inline-block; padding:14px 36px; background:#ff5a5f; color:#fff; border-radius:9px; font-family:'Mulish',sans-serif; font-size:13px; font-weight:800; text-transform:uppercase; letter-spacing:.08em; text-decoration:none;">
                Continue Shopping
            </a>
        </div>
    </div>
</section>
@endsection
