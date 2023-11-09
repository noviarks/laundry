<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Uom;

class ServiceController extends Controller
{
    public function index(){
        $data = [
            'title'         => 'Data Service',
            'data_service'  => Service::orderBy('id','desc')->get(),
            'data_uom'      => Uom::all()
        ];  

        return view('service.index',$data);
    }

    public function store(Request $request){
        $getRow     = Service::orderBy('id', 'desc')->first();
        
        if(isset($getRow)){
            $row    = (int)filter_var($getRow->id, FILTER_SANITIZE_NUMBER_INT);
        }else{
            $row    = 0;
        }

        $id     = "SV".sprintf("%03s",$row + 1);
        $desc   = $request->desc;
        $uom    = $request->uom;
        $price  = $request->price;
        
        Service::create([
            'id'        => $id,
            'desc'      => $desc,
            'uom_id'    => $uom,
            'price'     => $price
        ]);

        return redirect('/service')->with('success','Data Was Saved Successfully');
    }

    public function update(Request $request,$id){
        $desc   = $request->desc;
        $uom    = $request->uom;
        $price  = $request->price;

        Service::where('id',$id)
            ->update([
                'desc'      => $desc,
                'uom_id'    => $uom,
                'price'     => $price
        ]);

        return redirect('/service')->with('success','Data Was Saved Successfully');
    }

    public function delete($id){        
        
        Service::where('id', $id)->delete();
        
        return redirect('/service')->with('success','Data Was Deleted Successfully');
    }

}
