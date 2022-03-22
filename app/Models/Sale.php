<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Customer;

class Sale extends Model
{
    use HasFactory;
    protected $guarded = ['created_at','updated_at'];

    const ACEPTADO=1;
    const PENDIENTE=2;
    const RECHASADO=3;
    const ANULADO=4;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
