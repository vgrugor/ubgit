<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motorcade extends Model
{
    protected $fillable = ['name', 'address', 'note'];
}
