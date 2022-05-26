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

class VendorController extends Controller
{
    public function show_vendors()
    {
        $user = Auth::user();
        if ($user->is_admin != 1) {
            return redirect()->back()->with('err', 'Acess Denied');
        }
        $vendors = User::where('is_vendor',1)->paginate(10);
        return view('vendors.show')->with('vendors', $vendors);
    }
}
