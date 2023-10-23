<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    public $fillable = [
        "name",
        "slug",
        "sku",
        "description",
        "base_price",
        "sale_price",
        "cost_price",
        "tax",
        "quantity",
        "alert_threshold",
        "status",
        "parent_category",
        "sub_category",
        "tag",
        "make_id",
        "year_id",
        "model_id",
        "featured_image",
        "gallary_images",
    ];
}
