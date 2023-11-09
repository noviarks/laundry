<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table        = 'invoices';
    protected $casts        = ['id','string'];
    public $incrementing    = false;

    protected $fillable = [
        'id',
        'invoice_date',
        'customer_id',
        'total',
        'user_id',
        'status'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function customer_progress(){
        return $this->hasMany(CustomerProgress::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function invoice_detil(){
        return $this->hasMany(InvoiceDetil::class);
    }

    public function payment(){
        return $this->hasMany(Payment::class);
    }

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
