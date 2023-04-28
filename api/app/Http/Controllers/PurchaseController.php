<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Payment_Mode;
use App\Models\Delivery_Mode;
use App\Http\Resources\Profile as ProfileResource;
use Validator;
use Carbon\Carbon;

class PurchaseController extends BaseController
{
    public function Purchase(Request $request, $id)
    {
        $profile = Profile::find($id);

        if (!$profile) 
        {
            return $this->sendError("A $id. profil nem található.");
        }

        $validator = Validator::make($request->all(), 
        [
            "payment_mode" => "required",
            "delivery_mode" => "required"
        ], 
        [
            "payment_mode.required" => "Fizetési mód megadása kötelező!",
            "delivery_mode.required" => "Házhoz szállitási módot kötelező megadni!"
        ]);

        if ($validator->fails()) 
        {
            return $this->sendError("Hiba az adatok megadásában.", $validator->errors());
        }

        $payment_mode = Payment_Mode::where("payment_mode", $request->payment_mode)->first();

        if (!$payment_mode) 
        {
            return $this->sendError("Érvénytelen fizetési mód van kiválasztva!");
        }

        $delivery_mode = Delivery_Mode::where("delivery_mode", $request->delivery_mode)->first();

        if (!$delivery_mode) 
        {
            return $this->sendError("Érvénytelen kézbesítési mód van kiválasztva!");
        }

        $profile->payment_mode_id = $payment_mode->id;
        $profile->delivery_mode_id = $delivery_mode->id;
        $profile->order_date = Carbon::now();
        $profile->update();

        return $this->sendResponse(new ProfileResource($profile), "A vásárlás sikeres!");
    }
}
