<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Organization;
use App\Department;

class AdminDepartmentController extends Controller
{
    //--------------------------ДОБАВЛЕНИЕ ОТДЕЛА-------------------------------
    
    public function add()
    {
        $organizations = Organization::select('id', 'name')->get();
        
        return view('admin.department.add')->with('organizationsList', $organizations);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, ['organization_id' => 'required|integer',
            'name' => 'required|unique:departments,name|max:100',
            'phone_number' => 'max:14'
            ]);
        
        $data = $request->all();
        
        $department = new Department;
        $department->fill($data);
        $department->save();
        
        return redirect('workerlist');
    }
    
    //--------------------------------------------------------------------------
}
