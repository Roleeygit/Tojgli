<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Order_date;
use App\Models\Payment_mode;
use App\Models\Delivery_mode;



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
        "user_id",
        "order_date",
        "payment_mode_id",
        "delivery_mode_id"
    ];
    public function user() 
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function order_date()
    {
        return $this->belongsTo(Order_date::class, "order_date");
    }

    public function payment_mode()
    {
        return $this->belongsTo(Payment_mode::class, "payment_mode_id");
    }

    public function delivery_mode()
    {
        return $this->belongsTo(Delivery_mode::class, "delivery_mode_id");
    }


    public $timestamps = false;
}
