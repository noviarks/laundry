<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceDetil;
use App\Models\Service;
use App\Models\Uom;
use App\Models\Customer;
use App\Models\CustomerProgress;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function index(){
        $data = [
            'title'         => 'Data Invoice',
            'data_invoice'  => Invoice::orderBy('id','desc')->get()
        ];
        session()->forget('list');
        return view('invoice.index',$data);
    }

    public function create(){
        $getRow = Invoice::orderBy('id', 'desc')->first();

        if(isset($getRow)){
            $row    = (int)filter_var($getRow->id, FILTER_SANITIZE_NUMBER_INT);
        }else{
            $row    = 0;
        }

        $id     = "INV".sprintf("%04s",$row + 1);
        $data   = [
                    'title'         => 'Create Invoice',
                    'data_service'  => Service::orderBy('desc','asc')->get(),
                    'id'            => $id,
                    'data_customer' => Customer::orderBy('id','asc')->get()

        ];

        return view('invoice.create',$data);
    }

    public function getServiceDetil(Request $request){
        $service_id = $request->service_id;

        $data = [
            'service_detil' => Service::where('id',$service_id)->get(),
            'data_uom'      => Uom::orderBy('desc','asc')->get()
        ];

        return view('invoice.ajax-service',$data);
    }

    public function addList(Request $request){
        $list           = session()->get('list',[]);
        $service_id     = $request->service_id;
        $data_service   = Service::find($service_id);
        $service_desc   = $data_service->desc;
        $qty            = $request->qty;
        $uom_id         = $data_service->uom->id;
        $uom_desc       = $data_service->uom->desc;
        $price          = $data_service->price;
        $row            = (int)filter_var($service_id, FILTER_SANITIZE_NUMBER_INT);
       

        $list[$row] = [
            'id'            => $row,
            'service_id'    => $service_id,
            'service_desc'  => $service_desc,
            'qty'           => $qty,
            'uom_id'        => $uom_id,
            'uom_desc'      => $uom_desc,
            'price'         => $price
        ];

        session()->put('list',$list);
        return redirect()->back()->with('success','List Was Added Succesfully');
    }

    public function updateList(Request $request){
        $service_id = $request->service_id;
        $row        = (int)filter_var($service_id, FILTER_SANITIZE_NUMBER_INT);
        $qty        = $request->qty;
        $list       = session()->get('list');

        if(isset($list[$row])){
            $list[$row]['qty'] = $qty;
            session()->put('list',$list);
        }

        return redirect()->back()->with('success','List Was Updated Succesfully');
        
    }

    public function deleteList($id){
        if($id){
            $list = session()->get('list');
            if(isset($list[$id])){
                unset($list[$id]);
                session()->put('list',$list);
            }

            return redirect()->back()->with('success','List Was Deleted Successfully');
        }
    }

    public function store(Request $request){
        $list = session()->get('list');

        if(!session('list')){
            return redirect()->back()->with('error','List Cannot Be Empty');
        }

        $invoice_id     = $request->invoice_id;
        $invoice_date   = date('Y-m-d');
        $customer       = $request->customer;
        $customer_array = explode(" - ", $customer);
        $customer_id    = $customer_array[0];
        $total_payment  = $request->total_payment;
        $user_id        = Auth::user()->id;

        Invoice::create([
            'id'                => $invoice_id,
            'invoice_date'      => $invoice_date,
            'customer_id'       => $customer_id,
            'total'             => $total_payment,
            'user_id'           => $user_id,
            'status'            => 'unpaid'
        ]);

        foreach($list as $row){
            $service_id = $row['service_id'];
            $qty        = $row['qty'];
            $uom_id     = $row['uom_id'];
            $price      = $row['price'];

            $getRow     = InvoiceDetil::orderBy('id', 'desc')->first();
            
            if(isset($getRow)){
                $row    = (int)filter_var($getRow->id, FILTER_SANITIZE_NUMBER_INT);
            }else{
                $row    = 0;
            }

            $invoice_detil_id  = "IDT".sprintf("%05s",$row + 1);
            $invoice_id         = $invoice_id;
            $total_price        = $qty * $price;

            InvoiceDetil::create([
                'id'        => $invoice_detil_id,
                'invoice_id'=> $invoice_id,
                'service_id'=> $service_id,
                'price'     => $price,
                'qty'       => $qty,
                'uom_id'    => $uom_id,
                'total'     => $total_price

            ]);
        }
        session()->forget('list');
        return redirect('invoice/detil/'.$invoice_id)->with('success','Data Was Saved Successfully');
    }

    public function detil($id){
        $data = [
            'title'             => 'Invoice Detil',
            'data_invoice'      => Invoice::where('id',$id)->first(),
            'data_invoice_detil'=> InvoiceDetil::where('invoice_id',$id)->get()
        ];
        
        return view('invoice.detil',$data);
    }

    public function cancel($id){
        $invoice        = Invoice::where('id',$id)->first();
        $user_invoice   = $invoice->user_id;
        $user_login     = Auth::user();

        if($user_invoice!= $user_login->id && $user_login->role != "owner"){
            return redirect('/invoice')->with('error','You Are Not Allowed To Cancel This');
        }

        Invoice::where('id',$id)
            ->update([
                'status'    => 'canceled'
        ]);

        CustomerProgress::where('invoice_id', $id)->delete();

        return redirect('/invoice')->with('success','Data Was Canceled Successfully');
    }

    public function print($id){
        $data = [
            'title'             => 'Invoice',
            'data_invoice'      => Invoice::where('id',$id)->first(),
            'data_invoice_detil'=> InvoiceDetil::where('invoice_id',$id)->get()
        ];
        
        return view('invoice.print',$data);
    }
}
