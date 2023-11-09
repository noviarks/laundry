<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\CustomerProgress;

class HomeController extends Controller
{
    public function index(){
        $data = [
            'title'             => 'Dashboard',
            'users'             => User::count(),
            'customers'         => Customer::count(),
            'invoices_paid'     => Invoice::whereYear('invoice_date', '=', date('Y'))
                                        ->whereMonth('invoice_date', '=', date('m'))
                                        ->where('status','paid')
                                        ->sum('total'),

            'invoices_unpaid'   => Invoice::whereYear('invoice_date', '=', date('Y'))
                                        ->whereMonth('invoice_date', '=', date('m'))
                                        ->where('status','unpaid')
                                        ->sum('total'),

            'customer_progress' => CustomerProgress::orderBy('id','desc')->get()
        ];

        return view('home.index',$data);
    }
}
