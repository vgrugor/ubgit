<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Organization;
use App\Department;
use App\Division;

class AdminDivisionController extends Controller
{
    
    //-------------------------СПИСОК ПОДРАЗДЕЛЕНИЙ-----------------------------
    
    public function divisionsList()
    {
        $divisions = Division::leftJoin('organizations', 'organizations.id', '=', 'divisions.organization_id')
                ->leftJoin('departments', 'departments.id', '=', 'divisions.department_id')
                ->select('organizations.name as organization',
                        'departments.name as department', 
                        'divisions.name as name', 
                        'divisions.note as note')
                ->get();
        
        return view('admin.division.list')->with('divisionsList', $divisions);
    }

    //--------------------------------------------------------------------------
    
    
    //-------------------------ДОБАВЛЕНИЕ ПОДРАЗДЕЛЕНИЯ-------------------------
    
    public function add()
    {
        $organizations = Organization::select('id', 'name')->get();
        
        return view('admin.division.add')->with(['organizationsList' => $organizations]);
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
    
    //--------------------------------------------------------------------------
}
