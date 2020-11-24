<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Internet_request;
use App\Internet_request_type;
use App\Internet_provider;
use App\Point;
use App\http\Requests\internet_request\InternetRequestRequest;

class AdminInternetRequestController extends Controller
{
    //---------------------СПИСОК ПРОВАЙДЕРОВ ИНТЕРНЕТА-------------------------

    public function internetRequestsList()
    {
        $internetRequests = Internet_request::leftJoin('Internet_request_types', 'Internet_request_types.id', '=', 'internet_requests.internet_request_type_id')
            ->leftJoin('points', 'points.id', '=', 'internet_requests.point_id')
            ->leftJoin('internet_providers', 'internet_providers.id', '=', 'internet_requests.internet_provider_id')
            ->select([
                'internet_requests.id as id',
                'points.name as point',
                'internet_providers.name as provider',
                'internet_request_types.name as type',
                'internet_requests.date_send',
                'internet_requests.date_request',
                'internet_requests.is_completed',
                'internet_requests.date_completion',
                'internet_requests.note as note'
            ])
            ->orderBy('internet_requests.date_send', 'desc')
            ->get();

        return view('admin.internet_request.list')->with(['internetRequestsList' => $internetRequests]);
    }

    //--------------------------------------------------------------------------


    //---------------------ДОБАВЛЕНИЕ ПРОВАЙДЕРА ИНТЕРНЕТА----------------------

    public function add()
    {

        $points = Point::select(['id', 'name'])->where('is_actual', '=', 1)->orderBy('created_at', 'desc')->get();
        $internetProviders = Internet_provider::select(['id', 'name'])->get();
        $internetRequestTypes = Internet_request_type::select(['id', 'name'])->get();

        return view('admin.internet_request.add')
            ->with([
                'pointsList' => $points,
                'internetProvidersList' => $internetProviders,
                'internetRequestTypesList' => $internetRequestTypes
            ]);
    }

    public function store(InternetRequestRequest $request)
    {
        $data = $request->all();

        $internetRequest = new Internet_request;
        $internetRequest->fill($data);
        $internetRequest->save();

        return redirect()->route('adminInternetRequestsList');
    }

    //--------------------------------------------------------------------------


    //------------------РЕДАКТИРОВАНИЕ ПРОВАЙДЕРА ИНТЕРНЕТА---------------------

    public function update($id)
    {
        $points = Point::select(['id', 'name'])->where('is_actual', '=', 1)->orderBy('created_at', 'desc')->get();
        $internetProviders = Internet_provider::select(['id', 'name'])->get();
        $internetRequestTypes = Internet_request_type::select(['id', 'name'])->get();
        $internetRequest = Internet_request::find($id);

        return view('admin.internet_request.update')
            ->with(['internetRequest' => $internetRequest,
            'pointsList' => $points,
            'internetProvidersList' => $internetProviders,
            'internetRequestTypesList' => $internetRequestTypes
        ]);
    }

    public function save($id, InternetRequestRequest $request)
    {
        $internetRequest = Internet_request::find($id);

        $internetRequest->point_id = $request->input('point_id');
        $internetRequest->internet_provider_id = $request->input('internet_provider_id');
        $internetRequest->internet_request_type_id = $request->input('internet_request_type_id');
        $internetRequest->date_send = $request->input('date_send');
        $internetRequest->date_request = $request->input('date_request');
        $internetRequest->is_completed = $request->input('is_completed');
        $internetRequest->date_completion = $request->input('date_completion');
        $internetRequest->note = $request->input('note');

        $internetRequest->save();

        return redirect()->route('adminInternetRequestsList');
    }

    //--------------------------------------------------------------------------
}
