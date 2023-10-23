<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleYear extends Model
{
    use HasFactory;

    public $fillable = [
        "make_id",
        "model_id",
        "year",
        "status",
    ];
}
