<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'organization_id', 
        'department_id', 
        'division_id', 
        'name'
    ];
}
