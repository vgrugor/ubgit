<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Drill;

class DrillController extends Controller
{
    public function general()
    {
        $drills = Drill::select(['id', 'name', 'number'])->get();
                
        return view('drill.index')->with('drills', $drills);
    }
}
