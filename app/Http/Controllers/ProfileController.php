<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        $data = [
            'title'         => 'Profile',
            'data_profile'  => User::where('id',$user->id)->first()
        ];

        return view('profile.index',$data);
    }

    public function update(Request $request,$id){

        $name   = $request->name;
        $email  = $request->email;

        if(isset($request->password)){
            $password   = Hash::make($request->password);
        }else{
            $password = null;
        }
        
        $user = User::where('id',$id)
            ->update([
                'name'      => $name,
                'email'     => $email,
        ] + ($password == null ? [] : ['password'   => $password]));

        return redirect('/profile')->with('success','Profile Was Updated Successfully');
    }
}
