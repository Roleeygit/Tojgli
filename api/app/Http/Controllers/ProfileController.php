<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Profile;
use App\Models\Customer;
use App\Models\Order_date;
use App\Models\Payment_mode;
use App\Models\Delivery_mode;


class ProfileController extends Controller
{
    public function ProfilesData()
    {
        $profiles = Profile::with(['customer' , 'orderdate', 'paymentmode', 'deliverymode'])->get();
        return view("list_profiles", ["profiles" => $profiles]);
    }

    public function NewProfile() 
    {
        $customers = Customer::all();
        $order_dates = Order_date::all();
        $payment_modes = Payment_mode::all();
        $delivery_modes = Delivery_mode::all();


        return view('new_profile', compact('customers', 'order_dates', 'payment_modes', 'delivery_modes'));
    }

    public function StoreProfiles(Request $request)
    {
        $profile = Profile::create($request->all());
        $validator = $request->validate
        ([
            'surname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'country' => 'required|max:255',
            'city' => 'required|max:255',
            'address' => 'required|max:255',
            'customer_id' => 'required',
            'payment_mode_id' => 'required',
            'delivery_mode_id' => 'required'
        ]);
        
        $profile = new Profile();
        $profile->surname = $request->input('surname');
        $profile->lastname = $request->input('lastname');
        $profile->country = $request->input('country');
        $profile->city = $request->input('city');
        $profile->address = $request->input('address');
        // $profile->order_date = date("Y-m-d H:i:s");
        $profile->customer_id = $request->input('customer_id');
        $profile->payment_mode_id = $request->input('paymentmode_id');
        $profile->delivery_mode_id = $request->input('deliverymode_id');
        $profile->save();



        
            session()->flash("success", "Adat feltöltése sikeres!");
            return redirect("/new-profile");

    }
    

    
    
}
