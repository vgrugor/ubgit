<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Organization;
use App\Department;

class DepartmentController extends Controller
{
    public function add()
    {
        $organizations = Organization::select('id', 'name')->get();
        
        return view('department.add')->with('organizationsList', $organizations);
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
    
    public function getAjaxList(Request $request)
    {
        $options = $request->all();
        
        $departments = Department::select('id', 'name')
                ->where('departments.organization_id', $options['organization'])
                ->get();
        
        $departmentsList[] = '<option value="">не обрано</option>';
        
        foreach ($departments as $departmentItem) {
            $departmentsList[] = '<option value="' . $departmentItem->id . '">' . $departmentItem->name . '</option>';
        }
        
        return response(['departmentsList' => $departmentsList, 'options' => $request->all()], 200);
    }
}
