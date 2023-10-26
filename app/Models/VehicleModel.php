<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    use HasFactory;

    public $fillable = [
        "name",
        "slug",
        "description",
        "make_id",
        "status",
    ];
    public function products()
    {
        return $this->hasMany(Product::class, 'model_id', 'id');
    }
}
