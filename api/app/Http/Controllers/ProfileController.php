<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Profile;
use App\Models\User;
use App\Models\Order_date;
use App\Models\Payment_mode;
use App\Models\Delivery_mode;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Profile as ProfileResource;


class ProfileController extends BaseController
{

    public function ListProfiles( Request $request)
    {

        $profiles = Profile::with(["user", "order_date", "payment_mode", "delivery_mode"])->get();
        return $this->sendResponse(ProfileResource::collection($profiles), "Profil Adatok kiirva!");

    }   

    public function UpdateProfile(Request $request, $id)
    {
        $profile = $request->all();

        $validator = Validator::make($profile, 
        [
            "surname" => "required",
            "lastname" => "required",
            "country" => "required",
            "city" => "required",
            "address" => "required",
        ],
        [
            "surname.required" => "Családnév megadása kötelező!",
            "lastname.required" => "Keresztnév megadása kötelező!",
            "country.required" => "Ország megadása kötelező!",
            "city.required" => "Város megadása kötelező!",
            "address.required" => "Utca megadása kötelező!",
        ]
    );

        if ($validator->fails())
        {
            return $this->sendError($validator->errors());
        }

        $profile = Profile::find($id);

        if ($profile) 
        {
            $profile->update($request->all());
            return $this->sendResponse(new ProfileResource($profile), "Profil Adatok frissítve!");
        } 
        else 
        {
            return $this->sendError("A profil nem található ezzel az idvel: ".$id);
        }

        $profile->save();

        return $this->sendResponse(new UserResource($user), "Profil sikeresen frissitve!");
    }
    
}
