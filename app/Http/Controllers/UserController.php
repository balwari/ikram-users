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

class UserController extends Controller
{
    public function show() {
        $user = Auth::user();
        $role = $user->role; 
        if($role == 'admin'){
            $users = User::where('role', '=', 'user')->paginate(5);
        }else if($role == 'user'){
            $users = User::where('id','=',$user->id)->paginate(5);
        }
        return view('users.show')->with('users',$users)->with('role',$role);
    }
    
    public function update_user($id) {
        $user = User::find($id);
        return view('users.form')->with('user',$user);
    }

    public function update($id, Request $request) {

        $rules = [
            'name' => 'required|string|min:3|max:25',
            'email' => 'required|email',
            'phone' => 'required|string',
            'country' => 'required|string|min:3|max:30',
            'state' => 'required|string|min:2|max:30',
            'city' => 'required|string|min:2|max:30',
            'pincode' => 'required|integer',
            'photo' => 'file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.',
            'unique'    => ':attribute is already used',
        ];
        
        $user_details =  $this->validate($request, $rules, $customMessages);

        $user = User::find($id);
        $id = Auth::id();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->country = $request->input('country');
        $user->state = $request->input('state');
        $user->city = $request->input('city');
        $user->pincode = $request->input('pincode');
        if(isset($request->photo)){
            $imageName = time().'.'.$request->photo->extension();
             
            $upload = $request->photo->move(public_path(), $imageName);
            
            if(!$upload){
                return redirect()->back()->with('err', 'Something went wrong in Uploading Image');
            }
            $user['photo'] = $imageName;    
        }
        $update = $user->save();

        if(!$update){
            return redirect()->back()->with('err', 'Something went wrong in update');
        }
        return redirect()->route('show')->with('message', 'User Updated successfully');
    }

    public function deactivate($id) {
        $user = User::find($id);
        $updated_at = Carbon::now()->toDateTimeString();

        if($user->status == true){
            $user->status = false;
            $user->save();
        }else{
            $user->status = true;
            $user->save();
        }
        return redirect()->back()->with('message', 'User updated successfully');
    }

    public function delete($id) {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('message', 'User deleted successfully');
    }
}
