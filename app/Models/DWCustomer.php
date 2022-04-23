<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DWCustomer extends Model
{
    use HasFactory;
    protected $table        = "dim_customers";
    protected $connection   = "mysql2";
}
