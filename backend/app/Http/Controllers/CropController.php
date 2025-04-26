<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CropController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $crops = Crop::all(); // Fetch all crops from the database
        return response()->json($crops); // Return the crops as a JSON response
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // This method is not needed for APIs
        return response()->json(['message' => 'This method is not used in APIs.'], 404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'planting_date' => 'required|date',
            'harvest_date' => 'required|date',
            'farm_id' => 'required|exists:farms,id', // Ensure the farm_id exists in the farms table
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation for image
        ]);

        // Handle the image upload if present
        if ($request->hasFile('image')) {
            // Store the image and get the file path
            $imagePath = $request->file('image')->store('crop_images', 'public');
        } else {
            $imagePath = null; // No image uploaded
        }

        // Create a new crop with the image URL
        $crop = Crop::create([
            ...$validatedData,
            'image_url' => $imagePath, // Save the image URL in the database
        ]);

        // Return the created crop as a JSON response
        return response()->json($crop, 201); // 201 status code means "Created"
    }

    /**
     * Display the specified resource.
     */
    public function show(Crop $crop)
    {
        // Return the specified crop as a JSON response
        return response()->json($crop);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Crop $crop)
    {
        // This method is not needed for APIs
        return response()->json(['message' => 'This method is not used in APIs.'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Crop $crop)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255', // 'sometimes' means the field is optional
            'type' => 'sometimes|string|max:255',
            'planting_date' => 'sometimes|date',
            'harvest_date' => 'sometimes|date',
            'farm_id' => 'sometimes|exists:farms,id', // Ensure the farm_id exists in the farms table
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation
        ]);

        // Handle the image upload if present
        if ($request->hasFile('image')) {
            // Store the new image and get the file path
            $imagePath = $request->file('image')->store('crop_images', 'public');
        } else {
            $imagePath = $crop->image_url; // If no new image, keep the old one
        }

        // Update the crop
        $crop->update([
            ...$validatedData,
            'image_url' => $imagePath, // Update the image URL
        ]);

        // Return the updated crop as a JSON response
        return response()->json($crop);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Crop $crop)
    {
        // Delete the crop's image if it exists
        if ($crop->image_url) {
            Storage::disk('public')->delete($crop->image_url);
        }

        // Delete the crop
        $crop->delete();

        // Return a success response with no content
        return response()->json(null, 204); // 204 status code means "No Content"
    }
}
