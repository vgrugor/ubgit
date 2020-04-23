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
        $departments = Department::select('id', 'name')->get();
        
        return view('division.add')->with(['organizationsList' => $organizations, 
            'departmentsList' => $departments
            ]);
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
}
