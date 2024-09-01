<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(){
        $data = [
            'title'         => 'Data Customer',
            'data_customer'  => Customer::orderBy('id','desc')->get()
        ];
    
        return view('customer.index',$data);
    }

    public function store(Request $request){
        $getRow     = Customer::orderBy('id', 'desc')->first();
        
        if(isset($getRow)){
            $row    = (int)filter_var($getRow->id, FILTER_SANITIZE_NUMBER_INT);
        }else{
            $row    = 0;
        }

        $id         = "CS".sprintf("%03s",$row + 1);
        $name       = $request->name;
        $phone      = $request->phone;
        $address    = $request->address;

        Customer::create([
            'id'        => $id,
            'name'      => $name,
            'phone'     => $phone,
            'address'   => $address,
        ]);

        return redirect('/customer')->with('success','Data Was Saved Successfully');
    }

    public function update(Request $request,$id){
        $name       = $request->name;
        $phone      = $request->phone;
        $address    = $request->address;

        Customer::where('id',$id)
            ->update([
                'name'      => $name,
                'phone'     => $phone,
                'address'   => $address,
        ]);

        return redirect('/customer')->with('success','Data Was Saved Successfully');
    }

    public function delete($id){        
        
        Customer::where('id', $id)->delete();
        
        return redirect('/customer')->with('success','Data Was Deleted Successfully');
    }

    public function print($id){
        $data = [
            'title'         => 'Laundry',
            'data_customer'  => Customer::where('id',$id)->first()
        ];
        return view('customer.print',$data);
    }
}
