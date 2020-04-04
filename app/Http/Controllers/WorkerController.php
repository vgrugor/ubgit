<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Worker;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = Worker::select(['id', 'name', 'phone_number'])->get();
        
        return view('worker.index')->with('workers', $workers);
    }
}
