<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Invoice;
use App\Models\InvoiceDetil;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index(){
        $data = [
            'title'         => 'Data Payment',
            'data_payment'  => Payment::orderBy('id','desc')->get(),
            'data_invoice'  => Invoice::where('status','unpaid')->orderBy('id','desc')->get()
        ];

        return view('payment.index',$data);
    }

    public function store(Request $request){
        $getRow     = Payment::orderBy('id', 'desc')->first();
        
        if(isset($getRow)){
            $row    = (int)filter_var($getRow->id, FILTER_SANITIZE_NUMBER_INT);
        }else{
            $row    = 0;
        }

        $id                 = "PM".sprintf("%04s",$row + 1);
        $invoice            = $request->invoice;
        $invoice_array      = explode(" - ", $invoice);
        $invoice_id         = $invoice_array[0];
        $payment_date       = date('Y-m-d');
        $customer_payment   = $request->customer_payment;
        $customer_return    = $request->customer_return;
        $user_id            = Auth::user()->id;

        Payment::create([
            'id'                => $id,
            'invoice_id'        => $invoice_id,
            'payment_date'      => $payment_date,
            'customer_payment'  => $customer_payment,
            'customer_return'   => $customer_return,
            'user_id'           => $user_id,
            'status'            => 'done'
        ]);

        Invoice::where('id',$invoice_id)
            ->update([
                'status'  => 'paid'
        ]);

        return redirect('/payment')->with('success','Data Was Saved Successfully');
    }

    public function cancel($id){
        $payment        = Payment::where('id',$id)->first();
        $user_payment   = $payment->user_id;
        $user_login     = Auth::user();
        $invoice_id     = $payment->invoice_id;

        if($user_payment != $user_login->id && $user_login->role != "owner"){
            return redirect('/payment')->with('error','You Are Not Allowed To Cancel This');
        }

        Payment::where('id',$id)
            ->update([
                'status'    => 'canceled'
        ]);

       Invoice::where('id',$invoice_id)
            ->update([
                'status'    => 'unpaid'
        ]);

        return redirect('/payment')->with('success','Data Was Canceled Successfully');
    }

    public function print($id){
        $payment    = Payment::where('id',$id)->first();
        $invoice    = Invoice::where('id',$payment->invoice_id)->first();

        $data = [
            'title'             => 'Payment',
            'data_payment'      => $payment,
            'data_invoice'      => $invoice,
            'data_invoice_detil'=> InvoiceDetil::where('invoice_id',$invoice->id)->get()

        ];
        
        return view('payment.print',$data);
    }
}
