<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
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
        // "sub_category",
        "tag",
        "make_id",
        "year_id",
        "model_id",
        "featured_image",
        // "gallary_images",
    ];

    public function subCategories()
    {
        return $this->hasMany(ProductSubCategory::class, "product_id", "id");
    }


    public function productSubCategory()
    {
        return $this->belongsToMany(Category::class, 'product_sub_categories', 'product_id', 'sub_category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(TagModel::class, 'product_tags', 'product_id', 'tag_id');
    }

    // public function subCategory()
    // {
    //     return $this->hasMany(ProductSubCategory::class, 'product_id');
    // }

    public function getRouteKeyName()
    {
        return 'sku';
    }
}
