<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ChangePass extends Controller
{
    public function CPassword(){
        return view('admin.body.change_password');
    }

    public function UpdatePassword(Request $request){
        $validateData = $request->validate([
            "oldpassword"=>'required',
            "password"=>'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;

        if(Hash::check($request->oldpassword, $hashedPassword)){
            $user = User::find(Auth::id()); //find user by id

            $user->password = Hash::make($request->password);

            $user->save();

            Auth::logout();

            return Redirect()->route('login')->with("success", 'password has been changed');
        }else{
            return Redirect()->back()->with("success", 'password is invalid');
        }
    }

    public function PUpdate(){
        if(Auth::user()){
            $user = User::find(Auth::user()->id);

            if($user){
                return view('admin.body.update_profile', compact('user'));
            }
        }
    }

    public function UpdateProfile(Request $request){
        $user = User::find(Auth::user()->id);

        if($user){
            $user->name = $request['name'];
            $user->email = $request['email'];

            $user->save();
            return Redirect()->back()->with("success", "updated");
        }else{
            return Redirect()->back();
        }
    }

}
