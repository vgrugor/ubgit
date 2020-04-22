<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Controllers\Controller;
 
class TestController extends Controller
{
    public function test1()
    {
        return view('test.test1');
    }
    
    public function returnAjax()
    {
        $select = '<option value="">не обрано</option>';
        for($i=0; $i<10; $i++) {
            $select .= '<option value="">' . $i . '</option>';
        }
        //echo 'fdfsdfsdfsdfsdfsdfsd';
        return response($select ,200);
    }
}
