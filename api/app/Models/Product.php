<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        "name",
        "price",
        "weight",
        "image",
        "description"
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public $timestamps = false;
}
