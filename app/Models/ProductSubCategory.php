<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
    use HasFactory;
    public $fillable = [
        "product_id",
        "parent_id",
        "sub_category_id",
    ];

    public function subCategory() {
        return $this->belongsTo(Category::class, "sub_category_id", "id");
    }

}
