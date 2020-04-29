<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDrillController extends Controller
{
    
    //----------------------------ДОБАВЛЕНИЕ БУРОВОЙ----------------------------
    
    public function add()
    {
        return view('drill.add');
    }
    
    public function store()
    {
        
    }
    
    //--------------------------------------------------------------------------
}
