<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uom extends Model
{
    use HasFactory;

    protected $table        = 'uom';
    protected $casts        = ['id','string'];
    public $incrementing    = false;

    protected $fillable = [
        'id',
        'desc'
    ];

    public function service(){
        return $this->hasMany(Service::class);
    }

    public function invoice_detil(){
        return $this->hasMany(InvoiceDetil::class);
    }

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
