<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        "surname",
        "lastname",
        "country",
        "city",
        "address",
    ];
}
