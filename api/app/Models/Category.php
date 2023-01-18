<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    protected $fillable =
    [
        "category"
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public $timestamps = false;
}
