<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReview extends Model
{
    use HasFactory;

    public $fillable = [
        "user_id",
        "product_id",
        "rating",
        "title",
        "comment",
        "status",
    ];

    public function user()
    {
        return $this->belongsTo(Customer::class,'user_id','id');
    }
}
