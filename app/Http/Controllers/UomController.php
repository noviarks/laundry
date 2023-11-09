<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uom;

class UomController extends Controller
{
    public function index(){
        $data = [
            'title'     => 'Data UoM',
            'data_uom'  => Uom::orderBy('id','desc')->get()
        ];

        return view('uom.index',$data);
    }

    public function store(Request $request){
        $getRow     = Uom::orderBy('id', 'desc')->first();
        
        if(isset($getRow)){
            $row    = (int)filter_var($getRow->id, FILTER_SANITIZE_NUMBER_INT);
        }else{
            $row    = 0;
        }

        $id         = "UM".sprintf("%02s",$row + 1);
        $desc       = $request->desc;
        
        Uom::create([
            'id'    => $id,
            'desc'  => $desc
        ]);

        return redirect('/uom')->with('success','Data Was Saved Successfully');
    }

    public function update(Request $request,$id){
        $desc = $request->desc;

        Uom::where('id',$id)
            ->update([
                'desc'  => $desc
        ]);

        return redirect('/uom')->with('success','Data Was Saved Successfully');
    }

    public function delete($id){        
        
        Uom::where('id', $id)->delete();
        
        return redirect('/uom')->with('success','Data Was Deleted Successfully');
    }
}
