<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    function register(Request $request)
    {
        // return "ikram";
        $rules = [
            'name' => 'required|string|min:3|max:25',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string',
            'country' => 'required|string|min:3|max:30',
            'state' => 'required|string|min:2|max:30',
            'city' => 'required|string|min:2|max:30',
            'pincode' => 'required|integer',
            'password' => 'string|min:5|max:20|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required|string|min:5|max:20',
            'photo' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.',
            'unique'    => ':attribute is already used',
        ];

        $user_details =  $this->validate($request, $rules, $customMessages);
        $user_details['password'] = bcrypt($user_details['password']);
        $user_details['role'] = 'user';
        $user_details['status'] = true;
        // var_dump($request->photo);
        $imageName = time().'.'.$request->photo->extension();
             
        $upload = $request->photo->move(public_path(), $imageName);
        
        if(!$upload){
            return redirect()->back()->with('err', 'Something went wrong in Uploading Image');
        }

        $user_details['photo'] = $imageName;
  
        $create = User::create($user_details);

        if(!$create){
            return redirect()->back()->with('err', 'Something went wrong in Registration');
        }
        return redirect()->back()->with('message', 'Successfully Registered');
    }
}
