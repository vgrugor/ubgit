<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Video_surveillance_status;
use App\Http\Requests\video_surveillance_status\VideoSurveillanceStatusRequest;

class AdminVideoSurveillanceStatusController extends Controller
{
    //---------------------СПИСОК СТАТУСОВ ВИДЕОНАБЛЮДЕНИЯ-----------------------
    
    public function videoSurveillanceStatusesList()
    {
        $videoSurveillanceStatuses = Video_surveillance_status::getVideoSurveillanceStatusesList();
        
        return view('admin.video_surveillance_status.list')->with('videoSurveillanceStatusesList', $videoSurveillanceStatuses);
    }
    
    //--------------------------------------------------------------------------
    
    
    //----------------------------ДОБАВЛЕНИЕ СТАТУСА----------------------------
    
    public function add()
    {
        return view('admin.video_surveillance_status.add');
    }
    
    public function store(VideoSurveillanceStatusRequest $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'order_by' => 'integer'
        ]);
        
        $data = $request->all();
        
        $videoSurveillanceStatus = new Video_surveillance_status;
        $videoSurveillanceStatus->fill($data);
        $videoSurveillanceStatus->save();
        
        return redirect()->route('adminVideoSurveillanceStatusesList');
    }

    //--------------------------------------------------------------------------
    
    
    //---------------------------РЕДАКТИРОВАНИЕ СТАТУСА-------------------------
    
    public function update($id)
    {
        $videoSurveillanceStatus = Video_surveillance_status::getVideoSurveillanceStatus($id);
              
        return view('admin.video_surveillance_status.update')->with('videoSurveillanceStatus', $videoSurveillanceStatus);
    }
    
    public function save($id, VideoSurveillanceStatusRequest $request)
    {
        $videoSurveillanceStatus = Video_surveillance_status::getVideoSurveillanceStatus($id);
        
        $videoSurveillanceStatus->name = $request->input('name');
        $videoSurveillanceStatus->order_by = $request->input('order_by');
        
        $videoSurveillanceStatus->save();
        
        return redirect()->route('adminVideoSurveillanceStatusesList');
    }
    
    //--------------------------------------------------------------------------
}
