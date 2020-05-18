<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Organization;
use App\Organization_type;

class OrganizationController extends Controller
{
    //----------------------------ТИП ОРГАНИЗАЦИИ-------------------------------
    
    public function getAjaxOrganizationType(Request $request)
    {
        $options = $request->all();
        
        $organizationTypeId = Organization::where('type', $options['organization'])->pluck('type');
        $organizationType = Organization_type::where('id', $organizationTypeId)->pluck('name');
        
        return response($organizationType, 200);
    }
    
    //--------------------------------------------------------------------------
}
