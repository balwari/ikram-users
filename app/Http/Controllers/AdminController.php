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

class AdminController extends Controller
{
    public function check()
    {
        if (Auth::check()) {
    
            $user = Auth::user();
            if ($user->is_admin != 1) {
                return redirect()->back()->with('err', 'Acess Denied');
            }
            $role = $user->role;
            $users = User::paginate(5);
    
            return redirect('/home');
        } else {
            return view('auth.login');
        }
    }

    public function show_users()
    {
        $user = Auth::user();
        if ($user->is_admin != 1) {
            return redirect()->back()->with('err', 'Acess Denied');
        }
        $users = User::where('is_user',1)->paginate(10);
        return view('users.show')->with('users', $users);
    }

    public function show_create_user()
    {
        return view('users.create');
    }

    function create_user(Request $request)
    {
        // return "Balwari Ikram";
        $rules = [
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|unique:users,phone',
            'country' => 'required|string|min:3|max:50',
            'state' => 'required|string|min:2|max:50',
            'city' => 'required|string|min:2|max:50',
            'pincode' => 'required|integer',
            'password' => 'string|min:5|max:50|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required|string|min:5|max:50',
            'photo' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.',
            'unique'    => ':attribute is already used',
        ];

        $user_details =  $this->validate($request, $rules, $customMessages);
        $user_details['password'] = bcrypt($user_details['password']);
        $user_details['status'] = 1;

        if($request->role == 'is_user'){
            $user_details['is_user'] = 1;
        }elseif($request->role == 'is_vendor'){
            $user_details['is_vendor'] = 1;
        }elseif($request->role == 'is_client'){
            $user_details['is_client'] = 1;
        }
        // var_dump($request->photo);
        
        $directory = public_path() . "/profile_photos";
        $filecount = 0;
        $files = glob($directory . "*");
        if ($files) {
            $filecount = count($files);
        }

        $filecount = $filecount + 1;

        $imageName = $filecount . '.' . $request->photo->extension();

        $upload = $request->photo->move(public_path('profile_photos'), $imageName);

        if (!$upload) {
            return redirect()->back()->with('err', 'Something went wrong in Uploading Image');
        }

        $user_details['photo'] = $imageName;

        $create = User::create($user_details);

        if (!$create) {
            return redirect()->back()->with('err', 'Something went wrong in User creation');
        }
        return redirect()->back()->with('message', 'Successfully Created User');
    }

    public function show_update_user($id)
    {
        $user = User::find($id);
        return view('users.update')->with('user', $user);
    }

    public function update_user($id, Request $request)
    {
        // $rules = [
        //     'name' => 'required|string|min:3|max:50',
        //     'email' => 'required|email|unique:users,email',
        //     'phone' => 'required|string|unique:users,phone',
        //     'country' => 'required|string|min:3|max:50',
        //     'state' => 'required|string|min:2|max:50',
        //     'city' => 'required|string|min:2|max:50',
        //     'pincode' => 'required|integer',
        //     'photo' => 'file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ];

        // $customMessages = [
        //     'required' => 'The :attribute field is required.',
        //     'unique'    => ':attribute is already used',
        // ];

        // $user_details =  $this->validate($request, $rules, $customMessages);

        $user = User::find($id);
        $id = Auth::id();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->country = $request->input('country');
        $user->state = $request->input('state');
        $user->city = $request->input('city');
        $user->pincode = $request->input('pincode');

        if($request->input('role') == 'is_user'){
            $user->is_user = 1;
        }elseif($request->input('role') == 'is_vendor'){
            $user->is_vendor = 1;
        }elseif($request->input('role') == 'is_client'){
            $user->is_client = 1;
        }

        if (isset($request->photo)) {
            $imageName = time() . '.' . $request->photo->extension();

            $upload = $request->photo->move(public_path('profile_photos'), $imageName);

            if (!$upload) {
                return redirect()->back()->with('err', 'Something went wrong in Uploading Image');
            }
            $user['photo'] = $imageName;
        }
        $update = $user->save();

        if (!$update) {
            return redirect()->back()->with('err', 'Something went wrong in user update');
        }
        return redirect()->back()->with('message', 'User Updated successfully');
    }

    public function toggle_user($id)
    {
        $user = User::find($id);
        $updated_at = Carbon::now()->toDateTimeString();

        if ($user->status == true) {
            $user->status = false;
            $user->save();
            $message = "User Deactivated successfully";
        } else {
            $user->status = true;
            $user->save();
            $message = "User Activated successfully";
        }
        return redirect()->back()->with('message', $message);
    }

    public function delete_user($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('message', 'User deleted successfully');
    }
}
