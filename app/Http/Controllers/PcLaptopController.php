<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PcLaptopController extends Controller
{
    /**
     * Список всех моделей ноутбуков и ПК
     * @return type
     */
    public function pcLaptopModelList()
    {
        return view('pc_laptop.models');
    }
    
    /**
     * Список всех ноутбуков и ПК
     * @return type
     */
    public function pcLaptopList()
    {
        return view('pc_laptop.list');
    }
}
