<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $fillable = [
        "order_id",
        "product_id",
        "customer_id",
        "payment_method",
        "delivery_address",
    ];

}
