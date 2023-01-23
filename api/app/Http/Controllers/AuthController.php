<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController as BaseController;
use Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{

    public function signUp(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            "name" => "required",
            "email" => "required",
            "password" => "required",
            "confirm_password" => "required|same:password",
        ]);

        if($validator->fails())
        {
            return $this->sendError("Hibás regisztrációs adatok. Figyelj a megadott kritériumokra!");
        }

        $input = $request->all();
        $input ["password"] = bcrypt($input["password"]);
        $user = User::create($input);
        $success["name"] = $user->name;

        return $this->sendResponse($success, "Sikeres regisztráció");
    }

    public function signIn(Request $request) 
    {
        if(Auth::attempt(["email" => $request->email, "password" => $request->password]))
        {
            $authUser = Auth::user();
            $success["token"] = $authUser->createToken("MyAuthApp")->plainTextToken;
            $success["name"] = $authUser->name;
            
            return $this->sendResponse($success, "Sikeres belépés");
        }

        else
        {
            return $this->sendError("Hibás belépési adatok!");
        }
    }

    public function logOut(Request $request)
    {
        auth("sanctum")->user()->currentAccessToken()->delete();

        return response()->json("Sikeres kijelentkezés");
    }

}
