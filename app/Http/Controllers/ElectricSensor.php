<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ElectricSensor extends Controller
{
    public function store(Request $request)
    {
        \Log::info('Incoming sensor data', $request->all());

        
    }
}
