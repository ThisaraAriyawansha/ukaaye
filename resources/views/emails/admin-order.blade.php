<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; margin: 0; padding: 0; }
        .wrap { max-width: 600px; margin: 30px auto; background: #fff; border-radius: 10px; overflow: hidden; }
        .header { background: #1a1a2e; padding: 28px 30px; text-align: center; }
        .header h1 { color: #fff; margin: 0; font-size: 22px; }
        .header p { color: #aaa; margin: 6px 0 0; font-size: 13px; }
        .body { padding: 30px; }
        .body p { color: #444; line-height: 1.7; margin: 0 0 14px; }
        .order-code { font-size: 20px; font-weight: bold; color: #ff5a5f; letter-spacing: 2px; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th { background: #f3f3f3; padding: 10px 12px; text-align: left; font-size: 12px; color: #888; text-transform: uppercase; }
        td { padding: 10px 12px; border-bottom: 1px solid #f0f0f0; font-size: 14px; color: #333; }
        .totals td { border: none; }
        .totals .label { color: #888; }
        .totals .grand { font-weight: bold; font-size: 16px; color: #1a1a2e; }
        .info-grid { display: flex; gap: 20px; }
        .info-block { flex: 1; background: #fafafa; border-radius: 8px; padding: 14px 16px; margin-bottom: 16px; }
        .info-block h4 { margin: 0 0 8px; font-size: 11px; text-transform: uppercase; color: #aaa; letter-spacing: 1px; }
        .info-block p { margin: 0; font-size: 14px; color: #333; }
        .footer { background: #fafafa; padding: 20px 30px; text-align: center; font-size: 12px; color: #aaa; }
    </style>
</head>
<body>
<div class="wrap">
    <div class="header">
        <h1>New Order Received</h1>
        <p>Aromat Admin Notification</p>
    </div>
    <div class="body">
        <p>A new order has been placed.</p>
        <p>Order Code: <span class="order-code">{{ $order->order_code }}</span></p>

        <div class="info-block">
            <h4>Customer Details</h4>
            <p><strong>{{ $order->first_name }} {{ $order->last_name }}</strong></p>
            <p>{{ $order->email }} &bull; {{ $order->phone }}</p>
            <p>{{ $order->address }}, {{ $order->town }}, {{ $order->state }} {{ $order->zip }}</p>
        </div>

        @if($order->notes)
        <div class="info-block">
            <h4>Notes</h4>
            <p>{{ $order->notes }}</p>
        </div>
        @endif

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

        <p><strong>Payment Method:</strong> {{ str_replace('_', ' ', ucwords($order->payment_type, '_')) }}</p>
        <p>Please log in to the admin panel to manage this order.</p>
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} Aromat Baby Food Admin.
    </div>
</div>
</body>
</html>
