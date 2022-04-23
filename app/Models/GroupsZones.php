<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupsZones extends Model
{
    use HasFactory;

    protected $connection = "mysql";
    protected $table = "groups_zones";
}
