<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    protected $table        = 'progress';
    protected $casts        = ['id','string'];
    public $incrementing    = false;

    protected $fillable = [
        'id',
        'desc'
    ];

    public function customer_progress(){
        return $this->hasMany(CustomerProgress::class);
    }

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
