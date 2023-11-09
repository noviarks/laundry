<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $data = [
            'title'     => 'Data User',
            'data_user' => User::orderBy('id','desc')->get()
        ];

        return view('user.index',$data);
    }

    public function store(Request $request){
        $getRow     = User::orderBy('id', 'desc')->first();
        
        if(isset($getRow)){
            $row    = (int)filter_var($getRow->id, FILTER_SANITIZE_NUMBER_INT);
        }else{
            $row    = 0;
        }

        $id         = "US".sprintf("%03s",$row + 1);
        $name       = $request->name;
        $email      = $request->email;
        $password   = Hash::make($request->password);
        $role       = $request->role;
        
        User::create([
            'id'        => $id,
            'name'      => $name,
            'email'     => $email,
            'password'  => $password,
            'role'      => $role
        ]);

        return redirect('/user')->with('success','Data Was Saved Successfully');
    }

    public function update(Request $request,$id){

        $name   = $request->name;
        $email  = $request->email;
        $role   = $request->role;

        if(isset($request->password)){
            $password   = Hash::make($request->password);
        }else{
            $password = null;
        }
        
        User::where('id',$id)
            ->update([
                'name'      => $name,
                'email'     => $email,
                'role'      => $role
        ] + ($password == null ? [] : ['password'   => $password]));

        return redirect('/user')->with('success','Data Was Updated Successfully');
    }

    public function delete($id){        
        if(auth()->user()->id == $id){
            User::where('id', $id)->delete();
            return redirect('/logout');
        }else{
            User::where('id', $id)->delete();
        }
        
        return redirect('/user')->with('success','Data Was Deleted Successfully');
    }
}
