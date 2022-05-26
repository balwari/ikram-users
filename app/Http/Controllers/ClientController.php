<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Client;

class ClientController extends Controller
{
    public function show_clients()
    {
        $user = Auth::user();
        if ($user->is_admin != 1) {
            return redirect()->back()->with('err', 'Acess Denied');
        }
        $clients = User::where('is_client',1)->paginate(10);
        return view('clients.show')->with('clients', $clients);
    }

    public function show_create_client()
    {
        return view('clients.create');
    }

    function create_client(Request $request)
    {
        // return "Balwari Ikram";
        // $rules = [
        //     'name' => 'required|string|min:3|max:50',
        //     'email' => 'required|email|unique:users,email',
        //     'phone' => 'required|string|unique:users,phone',
        //     'country' => 'required|string|min:3|max:50',
        //     'state' => 'required|string|min:2|max:50',
        //     'city' => 'required|string|min:2|max:50',
        //     'pincode' => 'required|integer',
        //     'password' => 'string|min:5|max:50|required_with:confirm_password|same:confirm_password',
        //     'confirm_password' => 'required|string|min:5|max:50',
        //     'photo' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ];

        // $customMessages = [
        //     'required' => 'The :attribute field is required.',
        //     'unique'    => ':attribute is already used',
        // ];

        // $user_details =  $this->validate($request, $rules, $customMessages);
        $user_details = []; 
        $user_details['name'] = $request->name;
        $user_details['email'] = $request->email;
        $user_details['phone'] = $request->name;
        $user_details['password'] = bcrypt(12345);

        if($request->role == 'is_admin'){
            $user_details['is_admin'] = 1;
        }elseif($request->role == 'is_vendor'){
            $user_details['is_vendor'] = 1;
        }elseif($request->role == 'is_client'){
            $user_details['is_client'] = 1;
        }
        $user_details['status'] = 1;

        $user = User::create($user_details);

        if (!$user) {
            return redirect()->back()->with('err', 'Something went wrong in User creation');
        }

        $user_id = $user->id;

        $client_details = [];
        $client_details['user_id'] = $user_id;
        $client_details['secondary_phone'] = $request->secondary_phone;
        $client_details['gst'] = $request->gst;
        $client_details['country'] = $request->country;
        $client_details['state'] = $request->state;
        $client_details['city'] = $request->city;
        $client_details['contact_person'] = $request->contact_person;
        $client_details['secondary_contact_person'] = $request->secondary_contact_person;
        $client_details['invoice_type'] = $request->invoice_type;
        $client_details['address'] = $request->address;

        $client = Client::create($client_details);
        
        if (!$client) {
            return redirect()->back()->with('err', 'Something went wrong in inserting Client details');
        }

        return redirect()->back()->with('message', 'Successfully Created Client');
    }
}
