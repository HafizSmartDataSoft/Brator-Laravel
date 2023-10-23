<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    use HasFactory;

    public $fillable = [
        "name",
        "product_id",
        "customer_id",
        "company_name",
        "note",
        "country",
        "address",
        "suburb",
        "state",
        "postcode",
        "phone_number",
        "mail",
        "quantity",
        "coupons",
        "total_price",
        "payment_method",
        "status"
    ];
}
