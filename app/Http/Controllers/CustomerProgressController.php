<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\App\Model;
use App\Models\CustomerProgress;
use App\Models\Invoice;
use App\Models\Progress;
use Illuminate\Support\Facades\Auth;

class CustomerProgressController extends Controller
{
    public function index(){
        $data = [
            'title'                 => 'Data Customer Progress',
            'data_customer_progress'=>  CustomerProgress::orderBy('id','desc')->get(),
            'data_invoice'          =>  Invoice::where('status','!=','canceled')->orderBy('id','desc')->get(),
            'data_progress'         =>  Progress::orderBy('id','asc')->get()
        ];

        return view('customer-progress.index',$data);
    }

    public function store(Request $request){
        $getRow     = CustomerProgress::orderBy('id', 'desc')->first();
        
        if(isset($getRow)){
            $row    = (int)filter_var($getRow->id, FILTER_SANITIZE_NUMBER_INT);
        }else{
            $row    = 0;
        }

        $id             = "CP".sprintf("%05s",$row + 1);
        $invoice        = $request->invoice;
        $invoice_array  = explode(" - ", $invoice);
        $invoice_id     = $invoice_array[0];
        $progress_id    = $request->progress;
        $user_id        = Auth::user()->id;
        
        CustomerProgress::create([
            'id'            => $id,
            'invoice_id'    => $invoice_id,
            'progress_id'   => $progress_id,
            'user_id'       => $user_id
        ]);

        return redirect('/customer-progress')->with('success','Data Was Saved Successfully');
    }

    public function delete($id){        
        
        CustomerProgress::where('id', $id)->delete();
        
        return redirect('/customer-progress')->with('success','Data Was Deleted Successfully');
    }
}
