<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $table        = 'users';
     protected $casts        = ['id','string'];
     public $incrementing    = false;

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    public function invoice(){
        return $this->hasMany(Invoice::class);
    }

    public function customer_progress(){
        return $this->hasMany(CustomerProgress::class);
    }
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
