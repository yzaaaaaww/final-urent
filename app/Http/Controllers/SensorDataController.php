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
                'tenant_id' => 'required|exists:tenants,tenant_id'
            ]);

            $data = [
                'flow_rate' => $validated['flowRate'],
                'total_ml' => $validated['totalML'],
                'consumption' => $validated['consumption'] ?? 0,
                'tenant_id' => $validated['tenant_id']
            ];

            SensorData::create($data);

            $tenant = \App\Models\Tenant::where('tenant_id', $validated['tenant_id'])->first();
            if ($tenant) {
                $tenant->water_consumption += $validated['consumption'];
                $tenant->save();
            }

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