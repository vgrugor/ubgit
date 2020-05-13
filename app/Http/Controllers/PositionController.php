<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Position;
use App\Worker;

class PositionController extends Controller
{
    //------------------------------ВЫПАДАЮЩИЙ СПИСОК---------------------------
    
    public function getAjaxList(Request $request)
    {
        $options = $request->all();
        
        /*
        $positions = Position::select('id', 'name')
                ->where('positions.department_id', $options['department'])
                ->where('positions.division_id', $options['division'])
                ->get();
        */
        
        
        $positions = Position::leftJoin('workers', 'workers.position_id', '=', 'positions.id')
                ->select('positions.id as id', 'positions.name as name')
                ->where('positions.department_id', $options['department'])
                ->where('positions.division_id', $options['division'])
                ->whereNull('workers.position_id')
                ->get();
        
        $positionsList[] = '<option value="0">не обрано</option>';
        
        foreach ($positions as $positionItem) {
            $positionsList[] = '<option value="' . $positionItem->id . '">' . $positionItem->name . '</option>';
        }
        
        return response(['positionsList' => $positionsList, 'options' => $request->all()], 200);
    }
    
    //--------------------------------------------------------------------------
}
