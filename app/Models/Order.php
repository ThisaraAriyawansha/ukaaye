<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_code', 'first_name', 'last_name', 'town', 'address',
        'state', 'zip', 'phone', 'email', 'notes',
        'subtotal', 'shipping', 'payment_type', 'total', 'status',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    protected static function booted(): void
    {
        static::updated(function (Order $order) {
            if ($order->isDirty('status') && $order->status === 'rejected') {
                foreach ($order->items as $item) {
                    if ($item->product_id) {
                        Product::where('id', $item->product_id)->increment('qty', $item->qty);
                    }
                }
            }
        });
    }
}
