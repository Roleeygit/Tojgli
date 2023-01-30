<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Models\Payment_Mode;
use App\Models\Delivery_Mode;
use App\Http\Resources\Profile as ProfileResource;
use App\Http\Resources\UserResource;
use Validator;
use Carbon\Carbon;

class PurchaseController extends BaseController
{
    public function Purchase(Request $request, $id)
    {
        $profile = $request->all();

        if (!$profile) 
        {
            return $this->sendError("Nem létezik ilyen profil.");
        }
        



        $validator = Validator::make($profile, 
        [
            "payment_mode_id" => "required",
            "delivery_mode_id" => "required",
        ], 
        [
            "payment_mode_id.required" => "Fizetési mód megadása kötelező!",
            "delivery_mode_id.required" => "Házhoz szállitási módot kötelező megadni!",
        ]);


        if ($validator->fails()) 
        {
            return $this->sendError("Hiba az adatok megadásában.", $validator->errors());
        }

        $payment_mode = Payment_Mode::find($request->payment_mode_id);

        if (!$payment_mode) 
        {
            return $this->sendError("Érvénytelen fizetési mód van kiválasztva!");
        }

        $delivery_mode = Delivery_Mode::find($request->delivery_mode_id);

        if (!$delivery_mode) 
        {
            return $this->sendError("Érvénytelen kézbesítési mód van kiválasztva!");
        }

        $profile = Profile::find($id);
        $profile->payment_mode_id = $payment_mode->id;
        $profile->delivery_mode_id = $delivery_mode->id;
        $profile->order_date = Carbon::now();
        $profile->update();
        return $this->sendResponse(new ProfileResource($profile), "A vásárlás sikeres!");
    }
}
