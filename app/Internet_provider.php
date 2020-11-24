<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internet_provider extends Model
{
    protected $fillable = ['name', 'order_by', 'note'];
}
