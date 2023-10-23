<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $fillable = [
        "name",
        "slug",
        "description",
        "status",
        "parent_id",
        "image",
    ];
    // protected $primaryKey = 'name';

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
