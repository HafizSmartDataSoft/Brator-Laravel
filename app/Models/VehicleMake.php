<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleMake extends Model
{
    use HasFactory;
    public $fillable = [
        "name",
        "slug",
        "description",
        "link",
        "image",
        "status",
    ];
}
