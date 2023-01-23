<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Payment_mode;
use App\Models\Delivery_mode;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function updateProfile(Request $request, $user_id)
    {
        // Get the user's profile
        $profile = Profile::where('customer_id', $user_id)->first();

        // Get the chosen payment_mode and delivery_mode
        $payment_mode = Payment_mode::find($request->payment_mode_id);
        $delivery_mode = Delivery_mode::find($request->delivery_mode_id);

        // Update the user's profile with the chosen payment_mode and delivery_mode
        $profile->payment_mode()->associate($payment_mode);
        $profile->delivery_mode()->associate($delivery_mode);
        $profile->save();

        return redirect()->back()->with('success', 'Profile updated!');
    }
}
