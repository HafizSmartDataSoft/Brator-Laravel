<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagModel extends Model
{
    use HasFactory;

    public $fillable = [
        "name",
        "status",
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_tags', 'tag_id','product_id' );
    }
}
