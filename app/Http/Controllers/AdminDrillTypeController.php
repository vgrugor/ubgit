<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Drill_type;

class AdminDrillTypeController extends Controller
{
    //-------------------------СПИСОК ТИПОВ БУРОВЫХ-----------------------------
    
    public function drillTypesList()
    {
        $drillTypes = Drill_type::select('name')->get();
        
        return view('admin.drill_type.list')->with('drillTypesList', $drillTypes);
    }
    
    //--------------------------------------------------------------------------
}
