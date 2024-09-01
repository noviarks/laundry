<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Progress;

class ProgressController extends Controller
{
    public function index(){
        $data = [
            'title'         => 'Data Progress',
            'data_progress' => Progress::orderBy('id','desc')->get()
        ];  

        return view('progress.index',$data);
    }

    public function store(Request $request){
        $getRow     = Progress::orderBy('id', 'desc')->first();
        
        if(isset($getRow)){
            $row    = (int)filter_var($getRow->id, FILTER_SANITIZE_NUMBER_INT);
        }else{
            $row    = 0;
        }

        $id         = "PG".sprintf("%02s",$row + 1);
        $desc       = $request->desc;
        
        Progress::create([
            'id'    => $id,
            'desc'  => $desc
        ]);

        return redirect('/progress')->with('success','Data Was Saved Successfully');
    }

    public function update(Request $request,$id){
        $desc = $request->desc;

        Progress::where('id',$id)
            ->update([
                'desc'  => $desc
        ]);

        return redirect('/progress')->with('success','Data Was Saved Successfully');
    }

    public function delete($id){        
        
        Progress::where('id', $id)->delete();
        
        return redirect('/progress')->with('success','Data Was Deleted Successfully');
    }
}
