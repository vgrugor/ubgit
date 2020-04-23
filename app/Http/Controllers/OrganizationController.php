<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Organization;

class OrganizationController extends Controller
{
    //
    public function add()
    {
        return view('organization.add');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|max:50|unique:organizations,name',
                'address' => 'max:200'
            ]);
        
        $data = $request->all();
        
        $organization = new Organization;
        $organization->fill($data);
        $organization->save();
        
        return redirect('workerlist');
    }
}
