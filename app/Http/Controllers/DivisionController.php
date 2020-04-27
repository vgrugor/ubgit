<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Organization;
use App\Department;
use App\Division;

class DivisionController extends Controller
{
    public function add()
    {
        $organizations = Organization::select('id', 'name')->get();
        
        return view('division.add')->with(['organizationsList' => $organizations]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'organization_id' => 'required|integer',
            'department_id' => 'required|integer',
            'name' => 'required|unique:departments,name|max:100'
            ]);
        
        $data = $request->all();
        $division = new Division;
        $division->fill($data);
        
        $division->save();
                
        return redirect('workerlist');
    }
    
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
}
