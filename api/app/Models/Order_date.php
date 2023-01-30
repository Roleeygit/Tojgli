<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Profile;

class Order_date extends Model
{
    use HasFactory;

    protected $fillable =
    [
        "order_dates"
    ];

    public function profile()
    {
        return $this->hasMany("App\Models\Profile");
    }
}
    