<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; margin: 0; padding: 0; }
        .wrap { max-width: 600px; margin: 30px auto; background: #fff; border-radius: 10px; overflow: hidden; }
        .header { background: #124179; padding: 28px 30px; text-align: center; }
        .header h1 { color: #fff; margin: 0; font-size: 22px; letter-spacing: 1px; }
        .body { padding: 30px; }
        .body p { color: #444; line-height: 1.7; margin: 0 0 14px; }
        .order-code { font-size: 20px; font-weight: bold; color: #124179; letter-spacing: 2px; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th { background: #eaf0f8; padding: 10px 12px; text-align: left; font-size: 12px; color: #124179; text-transform: uppercase; }
        td { padding: 10px 12px; border-bottom: 1px solid #f0f0f0; font-size: 14px; color: #333; }
        .totals td { border: none; }
        .totals .label { color: #888; }
        .totals .grand { font-weight: bold; font-size: 16px; color: #124179; }
        .footer { background: #fafafa; padding: 20px 30px; text-align: center; font-size: 12px; color: #aaa; }
    </style>
</head>
<body>
<div class="wrap">
    <div class="header">
        <h1>Ukaaye</h1>
        <p style="color:#a8c4e0; margin:6px 0 0; font-size:13px;">Telecommunications, Satellite, Networking &amp; Fiber Products</p>
    </div>
    <div class="body">
        <p>Dear <strong>{{ $order->first_name }} {{ $order->last_name }}</strong>,</p>
        <p>Thank you for your order with Ukaaye! We have received it and will process it shortly.</p>
        <p>Your order code: <span class="order-code">{{ $order->order_code }}</span></p>

        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>LKR {{ number_format($item->price, 2) }}</td>
                    <td>LKR {{ number_format($item->subtotal, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <table class="totals">
            <tr>
                <td class="label">Subtotal</td>
                <td>LKR {{ number_format($order->subtotal, 2) }}</td>
            </tr>
            <tr>
                <td class="label">Shipping</td>
                <td>LKR {{ number_format($order->shipping, 2) }}</td>
            </tr>
            <tr>
                <td class="grand">Total</td>
                <td class="grand">LKR {{ number_format($order->total, 2) }}</td>
            </tr>
        </table>

        <p><strong>Shipping Address:</strong><br>
            {{ $order->address }}, {{ $order->town }}, {{ $order->state }} {{ $order->zip }}
        </p>
        <p><strong>Payment:</strong> {{ str_replace('_', ' ', ucwords($order->payment_type, '_')) }}</p>
        <p>We will notify you once your order is dispatched. If you have any questions, feel free to contact us.</p>
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} Ukaaye &mdash; Telecommunications, Satellite, Networking &amp; Fiber Products, Sri Lanka. All rights reserved.
    </div>
</div>
</body>
</html>
