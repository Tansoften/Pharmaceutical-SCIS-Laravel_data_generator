<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "product";
    protected $fillable = [
            'item_code',
            'name',
            'unit',
            'drug_category_id',
            'drug_application_id',
            'ven_status_id'
    ];
}
