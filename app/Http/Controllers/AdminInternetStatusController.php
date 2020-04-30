<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Internet_status;

class AdminInternetStatusController extends Controller
{
    
    //----------------------СТАТУСЫ ИНТЕРНЕТА-----------------------------------
    
    public function internetStatusesList()
    {
        $internetStatuses = Internet_status::select('name')->get();
        
        return view('admin.internet_status.list')->with('internetStatusesList', $internetStatuses);
    }

    //--------------------------------------------------------------------------
}
