<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\User as UserResource;
use Validator;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends BaseController
{
    public function UserRegister(Request $request)
    {
        $input = $request->all();

        DB::statement("ALTER TABLE users AUTO_INCREMENT = 1;");
        DB::statement("ALTER TABLE profiles AUTO_INCREMENT = 1;");

        $validator = Validator::make($input, 
        [
            "username" => "required|unique:users|min:5",
            "email" => "required|email|unique:users",
            "password" => "required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/",
            "confirm_password" => "required|same:password"
        ],
        [
            "username.required" => "A felhasználónév megadása kötelező!",
            "username.unique" => "Ez a felhasználónév már foglalt!",
            "username.min" => "A felhasználónévnek minimum 5 karakter hosszúnak kell lennie!",

            "email.required" => "Az email mező kitöltése kötelező!",
            "email.email" => "Az email formátuma nem megfelelő! (@) ",
            "email.unique" => "Ez az email cim már használatban van!",

            "password.required" => "A jelszó megadása kötelező!",
            "password.min" => "A jelszónak minimum 6 karakter hosszúnak kell lennie!",
            "password.regex" => "A jelszónak minimum tartalmaznia kell egy számot, egy nagybetűt és egy kisbetűt!",

            "confirm_password.required" => "A jelszó újboli megadása kötelező!",
            "confirm_password.same" => "A jelszavaknak eggyezniük kell!"
        ]
    );

        if($validator->fails())
        {
            return $this->sendError("Hibás regisztrációs adatok", $validator->errors());
        }

        $input["password"] = bcrypt($input["password"]);
        $user = User::create($input);
        
        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->save();

        return $this->sendResponse($user, "Regisztráció sikeres.");
    }

    public function UserLogin(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, 
        [
            "username_or_email" => "required",
            "password" => "required"
        ], 
        [
            "username_or_email.required" => "A felhasználónév vagy az email megadása kötelező!",
            
            "password.required" => "A jelszó megadása kötelező!"
        ]);

        if($validator->fails())
        {
            return $this->sendError("Hibás bejelentkezési adatok", $validator->errors());
        }

        $user = User::where('username', $input['username_or_email'])->orWhere('email', $input['username_or_email'])->first();
    
        if(!$user)
        {
            return $this->sendError("Sikertelen bejelentkezés. Az adott felhasználó vagy email nem létezik.");
        }
    
        if(!Hash::check($input['password'], $user->password))
        {
            return $this->sendError("Sikertelen bejelentkezés. Helytelen jelszó.");
        }

        $authUser = Auth::login($user);

        $credentials = 
        [
            filter_var($input["username_or_email"], FILTER_VALIDATE_EMAIL) ? "email" : "username" => $input["username_or_email"],
            "password" => $input["password"],
        ];

        if(Auth::attempt($credentials))
        {
            $authUser = Auth::user();
            $success["token"] = $authUser->createToken("MyAuthApp")->plainTextToken;
            $success["username"] = $authUser->username;

            return $this->sendResponse($success, "Bejelentkezés sikeres!");
        }
        else
        {
            return $this->sendError("Sikertelen bejelentkezés. Kérem ellenőrizze a bejelentkezési adatait, és próbálja újra!");
        }
    }

    public function UserLogout(Request $request)
    {
        auth("sanctum")->user()->currentAccessToken()->delete();

        return response()->json("Sikeres kijelentkezés");
    }

    public function ListUsers()
    {
        $users = User::all();

        return $this->sendResponse(UserResource::collection($users), "Regisztrált felhasználók listája kiirva!");
    }

    public function UpdateUser(Request $request, $id)
    {
        $user = $request->all();

        $validator = Validator::make($user, 
        [
            "username" => "required|unique:users|min:5",
            "email" => "required|unique:users",
            "password" => "required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/"
        ],
        [
            "username.required" => "A felhasználónév megadása kötelező!",
            "username.unique" => "Ez a felhasználónév már foglalt!",
            "username.min" => "A felhasználónévnek minimum 5 karakter hosszúnak kell lennie!",

            "email.required" => "Az email mező kitöltése kötelező!",
            "email.email" => "Az email formátuma nem megfelelő! (@) ",
            "email.unique" => "Ez az email cim már használatban van!",

            "password.required" => "A jelszó megadása kötelező!",
            "password.min" => "A jelszónak minimum 6 karakter hosszúnak kell lennie!",
            "password.regex" => "A jelszónak minimum tartalmaznia kell egy számot, egy nagybetűt és egy kisbetűt!"
        ]
    );

        if ($validator->fails())
        {
            return $this->sendError($validator->errors());
        }

        $user = User::find($id);
        $user->update($request->all());
        $user["password"] = bcrypt($user["password"]);
        $user->save();


        return $this->sendResponse(new UserResource($user), "Felhasználó adatai frissítve!");
    }

    public function UpdateAdmin(Request $request, $id)
    {
        $input = $request->all();

        $validator = Validator::make($input,
        [
            "is_admin" => "required"
        ]
    );

    if ($validator->fails())
    {
        return $this->sendError($validator->errors());
    }

    $user = User::find($id);
    $user->update($request->all());
    $user->save();

    return $this->sendResponse(new UserResource($user), "Frissítés sikeres!");
    }

    public function ShowUserById ($id)
    {
        $user = User::find($id);

        if(is_null($user))
        {
            return $this->sendError("A felhasználó nem létezik!");
        }

        return $this->sendResponse(new UserResource($user), "$id. Felhasználó adatainak betöltése sikeres.");
        
    }

    public function DeleteUser($id)
    {
        User::destroy($id);
        
        $user = User::find($id);
        $users = User::where("id", ">", $id)->orderBy("id")->get();
        foreach($users as $user)
        {
            $user->id = $user->id -1;
            $user->save();
        }

        return $this->sendResponse([], "Felhasználó törlése sikeresen megtörtént.");
    }

}