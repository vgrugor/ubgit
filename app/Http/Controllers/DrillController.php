<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Drill;

class DrillController extends Controller
{
    public function general() {
        
        $drillsList = Drill::leftJoin('drill_types', 'drills.drill_type_id', '=', 'drill_types.id')
                ->leftJoin('actual_stages', 'drills.actual_stage_id', '=', 'actual_stages.id')
                ->select('drills.id',
                        'drills.name as drill', 
                        'drills.number as number', 
                        'drills.note as note',
                        'drill_types.name as type',
                        'actual_stages.name as actual_stage')
                ->get();
        
        return view('drill.general')->with('drillsList', $drillsList);
    }
    
    
    public function internet() {
        
        return view('drill.internet');
    }
    
    
    public function carpet() {
        
        $drillsList = Drill::leftJoin('actual_stages', 'drills.actual_stage_id','=', 'actual_stages.id')
                ->select('drills.name as drill', 'date_building', 'date_drilling', 
                'date_demount', 'date_transfer', 'date_refresh', 'actual_stages.name as actual_stage')
                ->get();
        
        return view('drill.carpet')->with('drillsList', $drillsList);
    }
    
    
    public function contacts() {
        
        $drillsList = Drill::select('name as drill', 'phone_number', 
                'email', 'address')
                ->get();
        
        return view('drill.contacts')->with('drillsList', $drillsList);
    }
    
    
    public function location() {
        
        return view('drill.location');
    }
    
    public function view($id)
    {
        $drill = Drill::find($id);
        dump($drill);
        //return view('drill.view')->with('drill', $drill);
    }
}
