<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        "username",
        "email",
        "password",
        "confirm_password",
        "terms"
    ];

    protected $hidden = [
        'password', 'confirm_password'
    ];

    public $timestamps = false;
}
