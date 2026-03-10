<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'full_name', 'email', 'phone', 'subject', 'message',
        'ip_address', 'is_read', 'read_at', 'status'
    ];

    protected $casts = [
        'is_read'     => 'boolean',
        'submitted_at' => 'datetime',
        'read_at'     => 'datetime',
    ];
}