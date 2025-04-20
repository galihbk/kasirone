<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'package_id',
        'order_id',
        'amount',
        'payment_type',
        'payment_code',
        'status',
    ];
}
