<?php

namespace App\Exports;

use App\Models\Payment;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PaymentExport implements FromView
{
    private $date1;
    private $date2;
    private $status;

    function __construct($date1,$date2,$status) {
            $this->date1 = $date1;
            $this->date2 = $date2;
            $this->status= $status;
    }

    public function view(): View
    {
        if($this->status == "All"){
            $data = [
                'title'             => 'Payment Export',
                'data_payment'      => Payment::whereBetween('payment_date', [$this->date1, $this->date2])->get(),
            ];
        }else{
            $data = [
                'title'             => 'Payment Export',
                'data_payment'      => Payment::whereBetween('payment_date', [$this->date1, $this->date2])
                                            ->where('status',$this->status)
                                            ->get(),
            ];
        }
       
        return view('payment-report.export',$data);
    }
}
