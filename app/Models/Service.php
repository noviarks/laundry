<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table        = 'services';
    protected $casts        = ['id','string'];
    public $incrementing    = false;

    protected $fillable = [
        'id',
        'desc',
        'uom_id',
        'price'
    ];

    public function uom()
    {
        return $this->belongsTo(Uom::class,'uom_id');
    }

    public function invoice_detil(){
        return $this->hasMany(InvoiceDetil::class);
    }

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
