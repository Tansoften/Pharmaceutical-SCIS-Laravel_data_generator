<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimDate extends Model
{
    use HasFactory;
    protected   $connection = "mysql2";
    public      $timestamps = false;
}
