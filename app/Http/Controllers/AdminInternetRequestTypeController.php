<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Internet_request_type;
use App\http\Requests\internet_request_type\internetRequestTypeRequest;

class AdminInternetRequestTypeController extends Controller
{
    //---------------------СПИСОК ПРОВАЙДЕРОВ ИНТЕРНЕТА-------------------------

    public function internetRequestTypesList()
    {
        $internetRequestTypes = Internet_request_type::orderBy('order_by', 'asc')->get();

        return view('admin.internet_request_type.list')->with(['internetRequestTypesList' => $internetRequestTypes]);
    }

    //--------------------------------------------------------------------------


    //---------------------ДОБАВЛЕНИЕ ПРОВАЙДЕРА ИНТЕРНЕТА----------------------

    public function add()
    {
        return view('admin.internet_request_type.add');
    }

    public function store(InternetRequestTypeRequest $request)
    {
        $data = $request->all();

        $internetRequestType = new Internet_request_type;
        $internetRequestType->fill($data);
        $internetRequestType->save();

        return redirect()->route('adminInternetRequestTypesList');
    }

    //--------------------------------------------------------------------------


    //------------------РЕДАКТИРОВАНИЕ ПРОВАЙДЕРА ИНТЕРНЕТА---------------------

    public function update($id)
    {
        $internetRequestType = Internet_request_type::find($id);

        return view('admin.internet_request_type.update')->with('internetRequestType', $internetRequestType);
    }

    public function save($id, InternetRequestTypeRequest $request)
    {
        $internetRequestType = Internet_request_type::find($id);

        $internetRequestType->name = $request->input('name');
        $internetRequestType->order_by = $request->input('order_by');
        $internetRequestType->note = $request->input('note');

        $internetRequestType->save();

        return redirect()->route('adminInternetRequestTypesList');
    }

    //--------------------------------------------------------------------------
}
