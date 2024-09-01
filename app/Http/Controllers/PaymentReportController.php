<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PaymentExport;
use Illuminate\Http\Request;

class PaymentReportController extends Controller
{
    public function index(){
        $payment    = Payment::orderBy('id','asc')->get();
        $date1      = date('d/m/Y',strtotime($payment[0]->payment_date));
        $date2      = date('d/m/Y');
        $data = [
            'title'         => 'Payment Report',
            'data_payment'  => $payment,
            'date1'         => $date1,
            'date2'         => $date2,
        ];

        return view('payment-report.index',$data);
    }

    public function export(Request $request) 
    {
        if(isset($request->date1) && isset($request->date2)){
            $date1 = str_replace('/', '-', $request->date1);
            $date1 = date('Y-m-d',strtotime($date1));

            $date2 = str_replace('/', '-', $request->date2);
            $date2 = date('Y-m-d',strtotime($date2));

            $status = $request->status;
        }
        
        return Excel::download(new PaymentExport($date1,$date2,$status), 'Payment_Export_'.date('d-m-Y').'.xlsx');
    }
}
