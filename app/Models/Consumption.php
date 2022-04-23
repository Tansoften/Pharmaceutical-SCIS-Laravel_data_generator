<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Customer;

class Consumption extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'quantity',
        'date_recorded',
        'product_id',
        'customer_id',
    ];

    public function customer(){
        return $this->hasOne(Customer::class, );
    }
}
