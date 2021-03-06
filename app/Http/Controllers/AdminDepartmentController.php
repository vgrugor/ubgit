<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Organization;
use App\Department;

class AdminDepartmentController extends Controller
{
    
    //--------------------------------СПИСОК ОТДЕЛОВ----------------------------
    
    public function departmentsList()
    {
        $organizations = Organization::select('name')->get();
        
        $departments = Department::leftJoin('organizations', 'organizations.id', '=', 'departments.organization_id')
                ->select('organizations.name as organization',
                        'departments.id as id',
                        'departments.name as name', 
                        'phone_number', 
                        'departments.note as note')
                ->get();
        
        return view('admin.department.list')
                ->with([
                    'departmentsList' => $departments, 
                    'organizationsList' => $organizations
                ]);
    }
    
    //--------------------------------------------------------------------------

    //--------------------------ДОБАВЛЕНИЕ ОТДЕЛА-------------------------------
    
    public function add()
    {
        $organizations = Organization::select('id', 'name')->get();
        
        return view('admin.department.add')->with('organizationsList', $organizations);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, ['organization_id' => 'required|integer',
            'name' => 'required|max:100',
            'phone_number' => 'max:14'
            ]);
        
        $data = $request->all();
        
        $department = new Department;
        $department->fill($data);
        $department->save();
        
        return redirect()->route('adminDepartmentsList');
    }
    
    //--------------------------------------------------------------------------
    
    //-------------------РЕДАКТИРОВАНИЕ ОТДЕЛОВ---------------------------------
    
    public function update($id)
    {
        $organizations = Organization::select('id', 'name')->get();
        
        $department = Department::find($id);
        
        return view('admin.department.update')->with([
            'department' => $department,
            'organizationsList' => $organizations
        ]);
    }
    
    public function save($id, Request $request)
    {
        $department = Department::find($id);
        
        $this->validate($request, [
            'organization_id' => 'required|integer',
            'name' => 'required|max:100',
            'phone_number' => 'max:14',
        ]);
        
        $department->organization_id = $request->organization_id;
        $department->name = $request->name;
        $department->phone_number = $request->phone_number;
        $department->note = $request->note;
        
        $department->save();
        
        return redirect()->route('adminDepartmentsList');
    }

    //--------------------------------------------------------------------------
}
