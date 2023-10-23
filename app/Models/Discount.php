<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    public $fillable = [
        "coupon_title",
        "coupon_code",
        "discount",
        "coupon_type",
        "start_date",
        "expiration_date",
        "minimum_amount",
        "max_uses",
        "once_check",
        "discount_on",
        "status",
    ];
    public function excludeProducts()
    {
        return $this->hasMany(DiscountExcludeProduct::class, "discount_id", "id");
    }
}
