<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Internet_provider;
use App\Http\Requests\internet_provider\InternetProviderRequest;

class AdminInternetProviderController extends Controller
{

    //---------------------СПИСОК ПРОВАЙДЕРОВ ИНТЕРНЕТА-------------------------

    public function internetProvidersList()
    {
        $internetProviders = Internet_provider::orderBy('order_by', 'asc')->get();

        return view('admin.internet_provider.list')->with(['internetProvidersList' => $internetProviders]);
    }

    //--------------------------------------------------------------------------


    //---------------------ДОБАВЛЕНИЕ ПРОВАЙДЕРА ИНТЕРНЕТА----------------------

    public function add()
    {
        return view('admin.internet_provider.add');
    }

    public function store(InternetProviderRequest $request)
    {
        $data = $request->all();

        $internetProvider = new Internet_provider;
        $internetProvider->fill($data);
        $internetProvider->save();

        return redirect()->route('adminInternetProvidersList');
    }

    //--------------------------------------------------------------------------


    //------------------РЕДАКТИРОВАНИЕ ПРОВАЙДЕРА ИНТЕРНЕТА---------------------

    public function update($id)
    {
        $internetProvider = Internet_provider::find($id);

        return view('admin.internet_provider.update')->with('internetProvider', $internetProvider);
    }

    public function save($id, InternetProviderRequest $request)
    {
        $internetProvider = Internet_provider::find($id);

        $internetProvider->name = $request->input('name');
        $internetProvider->order_by = $request->input('order_by');
        $internetProvider->note = $request->input('note');

        $internetProvider->save();

        return redirect()->route('adminInternetProvidersList');
    }

    //--------------------------------------------------------------------------


}
