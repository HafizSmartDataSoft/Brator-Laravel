<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageSetting extends Model
{
    use HasFactory;
    public $fillable = [
        "type_name",
        "width",
        "height",
        "status",
    ];

    public function workOn()
    {
        return $this->hasMany(TypeWorkOn::class, "type_id", "id");
    }

}
