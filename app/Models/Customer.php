<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sale;
class Customer extends Model
{
    use HasFactory;
    protected $guarded = ['created_at','updated_at'];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
