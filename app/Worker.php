<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Worker extends Model
{
    protected $fillable = ['name', 'email', 'phone_number'];
    
    public function getDateRefreshAttribute($date) 
    {
        if ($date != '0000-00-00') {
            return Carbon::createFromFormat('Y-m-d', $date)->format('d.m.Y');
        }
        return '-';
    }
}
