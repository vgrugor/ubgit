<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internet_request_type extends Model
{
    protected $fillable = ['name', 'order_by', 'note'];
}
