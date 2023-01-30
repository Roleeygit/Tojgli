<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Customer extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = 
    [
        "username",
        "email",
        "password",
        "confirm_password",
        "terms"
    ];

    protected $hidden = 
    [
        "password", "confirm_password"
    ];

    public function generateToken()
    {
        $token = new Token();
        $token->token = Str::random(60);
        $token->expiration = now()->addDays(1);
        $token->customer_id = $this->id;
        $token->save();
        return $token->token;
    }
}
