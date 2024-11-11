<?php

namespace App\Http\Controllers;

use App\Models\ElectricSensor;
use Illuminate\Http\Request;

class ElectricSensorController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Add detailed logging for debugging
            \Log::info('Incoming electric sensor raw data:', $request->all());

            // Validate the incoming request
            $data = $request->validate([
                'volts_amperes' => 'required|numeric|min:0',
                'watts_hours' => 'required|numeric|min:0',
                'tenant_id' => 'required|exists:tenants,id',
            ]);

            // Round the values to 3 decimal places
            $data['volts_amperes'] = round($request->volts_amperes, 3);
            $data['watts_hours'] = round($request->watts_hours, 3);
            
            // Calculate consumption
            $data['consumption'] = $data['volts_amperes'] * $data['watts_hours'];

            // Create the record
            $sensor = ElectricSensor::create($data);

            \Log::info('Electric sensor data stored successfully:', $sensor->toArray());

            return response()->json([
                'success' => true,
                'message' => 'Data stored successfully',
                'data' => $sensor
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::warning('Validation failed:', [
                'errors' => $e->errors(),
                'request' => $request->all()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            \Log::error('Error storing electric sensor data:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Server error occurred',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
