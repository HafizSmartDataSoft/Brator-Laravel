<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeWorkOn extends Model
{
    use HasFactory;
    public $fillable = [
        "type_id",
        "work_on",
    ];

    public function imageSetting()
    {
        return $this->belongsTo(ImageSetting::class, 'type_id','id');
    }

}
