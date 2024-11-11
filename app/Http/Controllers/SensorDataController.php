<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SensorData;

class SensorDataController extends Controller
{
    public function store(Request $request)
    {
        \Log::info('Incoming sensor data', $request->all());

        try {
            $validated = $request->validate([
                'flowRate' => 'required|numeric',
                'totalML' => 'required|numeric',
                'consumption' => 'nullable|numeric|in:0,1',
            ]);

            $data = [
                'flow_rate' => $validated['flowRate'],
                'total_ml' => $validated['totalML'],
                'consumption' => $validated['consumption'] ?? 0,
            ];

            SensorData::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Data stored successfully'
            ], 200);

        } catch (\Exception $e) {
            \Log::error('Sensor data error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function index()
    {
        $data = SensorData::latest()->get();
        return view('sensor-data.index', compact('data'));
    }
} 