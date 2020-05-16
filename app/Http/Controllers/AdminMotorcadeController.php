<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Motorcade;

class AdminMotorcadeController extends Controller
{
    //---------------------СПИСОК АВТОКОЛОН-------------------------------------
    
    public function motorcadesList()
    {
        $motorcades = Motorcade::select('id', 'name', 'address', 'note')->get();
        
        return view('admin.motorcade.list')->with('motorcadesList', $motorcades);
    }
    
    //--------------------------------------------------------------------------
    
    
    //--------------------ДОБАВЛЕНИЕ АВТОКОЛОНЫ---------------------------------
    
    public function add()
    {
        return view('admin.motorcade.add');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'address' => 'max:256'
        ]);
        
        $data = $request->all();
        
        $motorcade = new Motorcade;
        $motorcade->fill($data);
        $motorcade->save();
        
        return redirect()->route('adminMotorcadesList');
    }

    //--------------------------------------------------------------------------
    
    
    //--------------------РЕДАКТИРОВАНИЕ АВТОКОЛОНЫ-----------------------------
    
    public function update($id)
    {
        $motorcade = Motorcade::find($id);
        
        return view('admin.motorcade.update')->with('motorcade', $motorcade);
    }

    public function save($id, Request $request)
    {
        $motorcade = Motorcade::find($id);
        
        $this->validate($request, [
            'name' => 'required|max:100',
            'address' => 'max:256'
        ]);
        
        $motorcade->name = $request->input('name');
        $motorcade->address = $request->input('address');
        $motorcade->note = $request->input('note');
        
        $motorcade->save();
        
        return redirect()->route('adminMotorcadesList');
    }

    //--------------------------------------------------------------------------
}
