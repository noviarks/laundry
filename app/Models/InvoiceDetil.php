<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetil extends Model
{
    use HasFactory;

    protected $table        = 'invoices_detil';
    protected $casts        = ['id','string'];
    public $incrementing    = false;

    protected $fillable = [
        'id',
        'invoice_id',
        'service_id',
        'price',
        'qty',
        'uom_id',
        'total'
    ];


    public function invoice()
    {
        return $this->belongsTo(Invoice::class,'invoice_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class,'service_id');
    }

    public function uom()
    {
        return $this->belongsTo(Uom::class,'uom_id');
    }


    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
