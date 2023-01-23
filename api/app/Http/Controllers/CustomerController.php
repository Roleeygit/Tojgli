<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Customer as CustomerResource;

class CustomerController extends BaseController
{
    public function RegisteredCustomerList()
    {
        $customers = Customer::all();

        return $this->sendResponse(CustomerResource::collection($customers), "Regisztrált felhasználók listája kiirva!");
    }

    public function CustomerRegister(Request $request)
    {
        $input = $request->all();

        DB::statement("ALTER TABLE customers AUTO_INCREMENT = 1;");

        $validator = Validator::make($input,
        [
            "username" => "required|min:5|unique:customers",
            "email" => "required|email|unique:customers",
            "password" => "required|min:8|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/",
            "confirm_password" => "required|same:password",
            "terms" => "required|accepted|digits_between:1,1"
        ],
        [
            "username.required" => "A felhasználónév megadása kötelező!",
            "username.unique" => "Ez a felhasználónév már foglalt!",
            "username.min" => "A felhasználónévnek minimum 5 karakternek hosszúnak kell lennie!",

            "email.unique" => "Az email mező kitöltése kitelező!",
            "email.email" => "Az email formátuma nem megfelelő! (@) ",
            "email.unique" => "Ez az email cim már használatban van!",

            "password.required" => "A jelszó megadása kötelező!",
            "password.min" => "A jelszónak minimum 6 karakter hosszúnak kell lennie!",
            "password.regex" => "A jelszónak minimum tartalmaznia kell egy számot, egy betűt, és egy speciális karatert(#&:;?/)!",

            "confirm_password.required" => "A jelszó újboli megagása kötelező!",
            "confirm_password.same" => "A jelszavaknak eggyezniük kell!",

            "terms.required" => "A feltételeketet meg kell adni! (1=elfogadva)",
            "terms.accepted" => "A feltételeket el kell fogadni a továbblépéshez!"
        ]
    
    );
        
        if ($validator->fails())
        {
            return $this->sendError($validator->errors());
        }

        $input = $request->all();
        $input ["password"] = bcrypt($input["password"]);
        $input ["confirm_password"] = bcrypt($input["confirm_password"]);
        $customer = Customer::create($input);
        $success["name"] = $customer->username;

        return $this->sendResponse(new CustomerResource($customer), "Sikeres regisztráció!");

    }

    public function UpdateCustomers(Request $request, $id)
    {
        $input = $request->all();

        $validator = Validator::make($input,
        [
            "username" => "required|min:5|unique:customers",
            "email" => "required|email|unique:customers",
            "password" => "required|min:8|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/",
            "confirm_password" => "required|same:password"
        ]);

        if ($validator->fails())
        {
            return $this->sendError($validator->errors());
        }

        $customer = customer::find($id);
        $customer->update($request->all());

        return $this->sendResponse(new CustomerResource($customer), "Felhasználó adatai frissítve!");
    }

    public function ShowCustomerById ($id)
    {
        $customer = Customer::find($id);

        if(is_null($customer))
        {
            return $this->sendError("A felhasználó nem létezik!");
        }

        return $this->sendResponse(new CustomerResource($customer), "$id. Felhasználó adatainak betöltése sikeres.");
        
    }

    public function DeleteCustomer($id)
    {
        Customer::destroy($id);
        
        $customer = Customer::find($id);
        $customers = Customer::where("id", ">", $id)->orderBy("id")->get();
        foreach($customers as $customer)
        {
            $customer->id = $customer->id -1;
            $customer->save();
        }

        return $this->sendResponse([], "Felhasználó törlése sikeresen megtörtént.");
    }

}