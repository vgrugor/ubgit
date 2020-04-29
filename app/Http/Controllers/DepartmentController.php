<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Department;

class DepartmentController extends Controller
{
    //-------------------------ВЫПАДАЮЩИЙ СПИСОК--------------------------------
    
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
    
    //--------------------------------------------------------------------------
}
