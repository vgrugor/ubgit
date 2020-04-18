<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Organization;
use App\Department;
use App\Division;
use App\Position;

class PositionController extends Controller
{
    public function add()
    {
        $organizations = Organization::select('id', 'name')->get();
        $departments = Department::select('id', 'name')->get();
        $divisions = Division::select('id', 'name')->get();
        
        return view('position.add')->with([
            'organizationsList' => $organizations,
            'departmentsList' => $departments,
            'divisionsList' => $divisions
        ]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'organization_id' => 'required|integer',
            'department_id' => 'required|integer',
            'division_id' => 'integer',
            'name' => 'required|max:256'
        ]);
        
        $data = $request->all();
        
        $position = new Position;
        $position->fill($data);
        
        $position->save();
        
        return redirect('workerlist');
    }
}
