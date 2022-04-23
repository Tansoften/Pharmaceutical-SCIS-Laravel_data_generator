<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drugs_category extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'description',
    ];
    protected $keyType = 'string';
}
