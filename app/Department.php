<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'organization_id', 
        'name', 
        'phone_number', 
        'note'
        ];
}
