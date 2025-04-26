<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use Illuminate\Http\Request;

class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $farms = Farm::all();
        return response()->json($farms);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'size' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
            'image_url' => 'nullable|string', // Add validation for image_url (nullable)
        ]);

        // Create a new farm with validated data
        $farm = Farm::create($validatedData);

        // Return the created farm as a JSON response
        return response()->json($farm, 201); // 201 status code means "Created"
    }

    /**
     * Display the specified resource.
     */
    public function show(Farm $farm)
    {
        return response()->json($farm);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Farm $farm)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255', // 'sometimes' makes the field optional
            'location' => 'sometimes|string|max:255',
            'size' => 'sometimes|numeric',
            'user_id' => 'sometimes|exists:users,id',
            'image_url' => 'nullable|string', // Allow updating image_url (nullable)
        ]);

        // Update the farm with validated data
        $farm->update($validatedData);

        // Return the updated farm as a JSON response
        return response()->json($farm);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Farm $farm)
    {
        $farm->delete();
        return response()->json(null, 204); // 204 status code means "No Content"
    }
}
