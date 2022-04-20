<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumption extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'quantity',
       // 'date',
        'product_id',
        'customer_id'
    ];
}
