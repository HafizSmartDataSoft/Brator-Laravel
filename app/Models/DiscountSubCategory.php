<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountSubCategory extends Model
{
    use HasFactory;
    public $fillable = [
        "discount_id",
        "sub_category_id",
    ];
}
