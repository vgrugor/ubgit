<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Drill;

class AdminDrillController extends Controller
{
    //---------------------------СПИСОК БУРОВЫХ---------------------------------
    
    public function drillsList()
    {
        $drillsList = Drill::leftJoin('drill_types', 'drills.drill_type_id', '=', 'drill_types.id')
                ->leftJoin('actual_stages', 'drills.actual_stage_id', '=', 'actual_stages.id')
                ->select('drills.id',
                        'drills.name as drill', 
                        'drills.number as number', 
                        'drills.note as note',
                        'drill_types.name as type',
                        'actual_stages.name as actual_stage')
                ->get();
        
        return view('admin.drill.list')->with('drillsList', $drillsList);
    }
    
    //--------------------------------------------------------------------------
    

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
