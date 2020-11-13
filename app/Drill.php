<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Drill extends Model
{
    protected $fillable = [
        'name', 
        'germany_name', 
        'drill_type_id', 
        'workers_transfer', 
        'phone_number', 
        'email', 
        'note'
        ];
}
