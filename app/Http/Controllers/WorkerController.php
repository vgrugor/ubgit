<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Worker;

class WorkerController extends Controller
{
    public function index() {
        
        $workers = Worker::select(['id', 'name', 'phone_number', 'date_refresh', 'note'])->orderBy('name', 'asc')->get();
        
        return view('worker.list')->with('workersList', $workers);
    }
    
    public function view($id)
    {
        $worker = Worker::select(['id', 'name', 'phone_number'])->where('id', $id)->first();
        //dump($worker);
        
        return view('worker.view')->with('worker', $worker);
    }
}
