<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Profile;

class Delivery_mode extends Model
{
    use HasFactory;

    protected $fillable =
    [
        "delivery_mode"
    ];
    public function profile()
    {
        return $this->hasMany('App\Models\Profile');
    }
}
