<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerProgress extends Model
{
    use HasFactory;

    protected $table        = 'customers_progress';
    protected $casts        = ['id','string'];
    public $incrementing    = false;

    protected $fillable = [
        'id',
        'invoice_id',
        'progress_id',
        'user_id'
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class,'invoice_id');
    }

    public function progress()
    {
        return $this->belongsTo(Progress::class,'progress_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
