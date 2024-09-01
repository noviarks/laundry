<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table        = 'customers';
    protected $casts        = ['id','string'];
    public $incrementing    = false;

    protected $fillable = [
        'id',
        'name',
        'phone',
        'address'
    ];

    public function invoice(){
        return $this->hasMany(Invoice::class);
    }

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
