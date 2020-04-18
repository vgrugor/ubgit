<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = ['organization_id', 'department_id', 'name', 'note'];
}
