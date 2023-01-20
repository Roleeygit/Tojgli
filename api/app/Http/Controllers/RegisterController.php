<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function Register()
    {
        return view("register");
    }
    //TODO Register not working, fix it. Add Terms.? 
    public function StoreCustomer(Request $request){
        $validator = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|confirmed',
            'confirm_password' => 'required|same:password'
            // 'terms' => 'accepted'
        ]);
        $customer = Customer::create([
            'username' => $validator['username'],
            'email' => $validator['email'],
            'password' => Hash::make($validator['password']),
        ]);

        return redirect('/home');
    }
}
