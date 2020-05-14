<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Motorcade;

class AdminMotorcadeController extends Controller
{
    public function motorcadesList()
    {
        $motorcades = Motorcade::select('name', 'address', 'note')->get();
        
        return view('admin.motorcade.list')->with('motorcadesList', $motorcades);
    }
}
