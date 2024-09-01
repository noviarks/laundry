<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UomController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentReportController;
use App\Http\Controllers\CustomerProgressController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [AuthController::class, 'index'])->name('/');
Route::post('/cek_login', [AuthController::class, 'cek_login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth', 'checkRole:owner']], function(){
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user/store', [UserController::class, 'store']);
    Route::post('/user/update/{id}', [UserController::class, 'update']);
    Route::get('/user/delete/{id}', [UserController::class, 'delete']);

    Route::get('/uom', [UomController::class, 'index']);
    Route::post('/uom/store', [UomController::class, 'store']);
    Route::post('/uom/update/{id}', [UomController::class, 'update']);
    Route::get('/uom/delete/{id}', [UomController::class, 'delete']);

    Route::get('/progress', [ProgressController::class, 'index']);
    Route::post('/progress/store', [ProgressController::class, 'store']);
    Route::post('/progress/update/{id}', [ProgressController::class, 'update']);
    Route::get('/progress/delete/{id}', [ProgressController::class, 'delete']);

    Route::get('/service', [ServiceController::class, 'index']);
    Route::post('/service/store', [ServiceController::class, 'store']);
    Route::post('/service/update/{id}', [ServiceController::class, 'update']);
    Route::get('/service/delete/{id}', [ServiceController::class, 'delete']);

    Route::get('/payment-report', [PaymentReportController::class, 'index']);
    Route::post('/payment-report/export', [PaymentReportController::class, 'export']);

});

Route::group(['middleware' => ['auth', 'checkRole:owner,employee']], function(){
    Route::get('/home', [HomeController::class, 'index']);

    Route::get('/customer', [CustomerController::class, 'index']);
    Route::post('/customer/store', [CustomerController::class, 'store']);
    Route::post('/customer/update/{id}', [CustomerController::class, 'update']);
    Route::get('/customer/delete/{id}', [CustomerController::class, 'delete']);
    Route::get('/customer/print/{id}', [CustomerController::class, 'print']);

    Route::get('/invoice', [InvoiceController::class, 'index']);
    Route::get('/invoice/create', [InvoiceController::class, 'create']);
    Route::post('/invoice/get-service-detil', [InvoiceController::class, 'getServiceDetil']);
    Route::post('/invoice/add-list', [InvoiceController::class, 'addList']);

    Route::post('/invoice/update-list', [InvoiceController::class, 'updateList']);
    Route::get('/invoice/delete-list/{id}', [InvoiceController::class, 'deleteList']);
    Route::post('/invoice/store', [InvoiceController::class, 'store']);
    Route::get('/invoice/detil/{id}', [InvoiceController::class, 'detil']);
    Route::get('/invoice/cancel/{id}', [InvoiceController::class, 'cancel']);
    Route::get('/invoice/print/{id}', [InvoiceController::class, 'print']);

    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/profile/update/{id}', [ProfileController::class, 'update']);

    Route::get('/customer-progress', [CustomerProgressController::class, 'index']);
    Route::post('/customer-progress/store', [CustomerProgressController::class, 'store']);
    Route::get('/customer-progress/delete/{id}', [CustomerProgressController::class, 'delete']);

    Route::get('/payment', [PaymentController::class, 'index']);
    Route::post('/payment/store', [PaymentController::class, 'store']);
    Route::get('/payment/cancel/{id}', [PaymentController::class, 'cancel']);
    Route::get('/payment/print/{id}', [PaymentController::class, 'print']);
});

