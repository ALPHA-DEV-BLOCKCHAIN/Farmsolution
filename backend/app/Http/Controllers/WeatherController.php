<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $weathers = Weather::all(); // Fetch all weather records
        return response()->json($weathers); // Return as JSON response
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Not needed for APIs
        return response()->json(['message' => 'This method is not used in APIs.'], 404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'date' => 'required|date',
            'temperature' => 'required|numeric',
            'humidity' => 'required|numeric',
            'rainfall' => 'required|numeric',
            'farm_id' => 'required|exists:farms,id', // Ensure the farm_id exists in the farms table
            'image_url' => 'nullable|string|url', // Ensure it's a valid URL
        ]);

        // Create a new weather record
        $weather = Weather::create($validatedData);

        // Return the created weather as a JSON response
        return response()->json($weather, 201); // 201 status code means "Created"
    }

    /**
     * Display the specified resource.
     */
    public function show(Weather $weather)
    {
        // Return the specified weather as a JSON response
        return response()->json($weather);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Weather $weather)
    {
        // Not needed for APIs
        return response()->json(['message' => 'This method is not used in APIs.'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Weather $weather)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'date' => 'sometimes|date',
            'temperature' => 'sometimes|numeric',
            'humidity' => 'sometimes|numeric',
            'rainfall' => 'sometimes|numeric',
            'farm_id' => 'sometimes|exists:farms,id', // Ensure the farm_id exists in the farms table
            'image_url' => 'sometimes|string|url', // Ensure it's a valid URL
        ]);

        // Update the weather record
        $weather->update($validatedData);

        // Return the updated weather as a JSON response
        return response()->json($weather);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Weather $weather)
    {
        // Delete the weather record
        $weather->delete();

        // Return a success response with no content
        return response()->json(null, 204); // 204 status code means "No Content"
    }
}
