<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Worker;
use App\Department;
use App\Drill;
use App\Organization;

class AdminWorkerController extends Controller
{
    
    //---------------------ДОБАВЛЕНИЕ СОТРУДНИКА--------------------------------
    
    public function add()
    {
        $organizations = Organization::select('id', 'name')->get();
        $drills = Drill::select('id', 'name')->get();
        
        return view('admin.worker.add')->with(['organizationsList' => $organizations,
                'drillsList' => $drills
            ]);
    }
    
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'organization_id' => 'required',
            'department_id' => 'required',
            'division_id' => '',
            'position_id' => 'required',
            'drill_id' => '',
            'name' => 'required|max:100',
            'account_ad' => 'max:50|unique:workers,account_ad',
            'phone_number' => 'max:14|unique:workers,phone_number',
            'email' => 'max:256|unique:workers,email',
            'vpn_status_id' => '',
            'date_refresh' => '',
            'note' => ''
        ]);
    }
    
    //--------------------------------------------------------------------------
}
