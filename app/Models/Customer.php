<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public $fillable = [
    "first_name",
    "last_name",
    "date_of_birth",
    "gender",
    "phone_number",
    "mail",
    "country",
    "address",
    "suburb",
    "state",
    "postcode",
    "password",
    "image",
    "status",
    ];


}
