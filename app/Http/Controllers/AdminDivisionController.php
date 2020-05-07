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
                        'divisions.id as id',
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
                
        return redirect()->route('adminDivisionsList');
    }
    
    //--------------------------------------------------------------------------
    
    
    //-------------------------РЕДАКТИРОВАНИЕ ПОДРАЗДЕЛЕНИЯ---------------------
    
    public function update($id)
    {
        $division = Division::find($id);
        
        $organizations = Organization::select('id', 'name')->get();
        $departments = Department::select('id', 'name')->where('organization_id', $division->organization_id)->get();
        
        return view('admin.division.update')->with([
            'division' => $division, 
            'organizationsList' => $organizations, 
            'departmentsList' => $departments
        ]);
    }
    
    public function save($id, Request $request)
    {
        $division = Division::find($id);
        
        $this->validate($request, [
            'organization_id' => 'required|integer',
            'department_id' => 'required|integer',
            'name' => 'required|max:100'
        ]);
        
        $division->organization_id = $request->organization_id;
        $division->department_id = $request->department_id;
        $division->name = $request->name;
        $division->note = $request->note;
        
        $division->save();
        
        return redirect()->route('adminDivisionsList');
    }

    //--------------------------------------------------------------------------
}
