<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DWConsumptions extends Model
{
    use HasFactory;
    protected   $connection     = "mysql2";
    protected   $table          = "consumption_facts";  
    public      $timestamps     = false;    
}
