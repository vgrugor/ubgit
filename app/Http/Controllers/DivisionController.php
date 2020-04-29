<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Division;

class DivisionController extends Controller
{
    //-------------------------ВЫПАДАЮЩИЙ СПИСОК--------------------------------
    
    public function getAjaxList(Request $request)
    {
        $options = $request->all();
        
        $divisions = Division::select('id', 'name')
                ->where('divisions.department_id', $options['department'])
                ->get();
        
        $divisionsList[] = '<option value="0">не обрано</option>';
        
        foreach ($divisions as $divisionItem) {
            $divisionsList[] = '<option value="' . $divisionItem->id . '">' . $divisionItem->name . '</option>';
        }
        
        return response(['divisionsList' => $divisionsList, 'options' => $request->all()], 200);
    }
    
    //--------------------------------------------------------------------------
}
