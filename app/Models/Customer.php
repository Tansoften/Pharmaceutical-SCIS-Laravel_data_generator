<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Consumption;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'groups_zone_id',
    ];
}
