<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Toastr;

class ProfileController extends Controller
{
    public function profile(User $User)
    {
        return view('profile', [
            'User' => User::where('id', Auth::user()->id)->first()
        ]);
    }

    public function update(Request $request){

        $this->validate($request, [
            'name'    => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users,email,'. Auth::user()->id],
            'phone'        => ['required', 'string', 'max:255', 'unique:users,phone,'. Auth::user()->id],
            'password'      => ['sometimes', 'nullable' , 'min:6', 'confirmed']
        ]);

        User::find(Auth::user()->id)->update([
            'name'    => $request['name'],
            'email'         => $request['email'],
            'phone'        => $request['phone']
        ]);

        if($request['password']){
            User::find(Auth::user()->id)->update([
                'password'      => Hash::make($request['password']),
            ]);
        }

        Toastr::success('Profile has been updated succesfully!', 'Title', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
