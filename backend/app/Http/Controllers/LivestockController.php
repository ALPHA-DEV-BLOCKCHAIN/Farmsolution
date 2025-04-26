<?php

namespace App\Http\Controllers;

use App\Models\Livestock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LivestockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livestocks = Livestock::all(); // Fetch all livestock records
        return response()->json($livestocks); // Return as JSON response
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
        // Validate the request data, including image (MODIFIED)
        $validatedData = $request->validate([
            'type' => 'required|string|max:255',
            'breed' => 'nullable|string|max:255',
            'quantity' => 'required|integer|min:1',
            'health_status' => 'nullable|string|max:255',
            'farm_id' => 'required|exists:farms,id', // Ensure the farm_id exists in the farms table
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image file (MODIFIED)
        ]);

        // Handle image upload if an image is provided (MODIFIED)
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('livestock_images', 'public');
            $validatedData['image_url'] = asset("storage/$imagePath"); // Store the public URL
        }

        // Create a new livestock record
        $livestock = Livestock::create($validatedData);

        // Return the created livestock as a JSON response
        return response()->json($livestock, 201); // 201 status code means "Created"
    }

    /**
     * Display the specified resource.
     */
    public function show(Livestock $livestock)
    {
        // Return the specified livestock as a JSON response
        return response()->json($livestock);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livestock $livestock)
    {
        // Not needed for APIs
        return response()->json(['message' => 'This method is not used in APIs.'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Livestock $livestock)
    {
        // Validate the request data, including optional image upload (MODIFIED)
        $validatedData = $request->validate([
            'type' => 'sometimes|string|max:255',
            'breed' => 'sometimes|string|max:255',
            'quantity' => 'sometimes|integer|min:1',
            'health_status' => 'sometimes|string|max:255',
            'farm_id' => 'sometimes|exists:farms,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image (MODIFIED)
        ]);

        // Handle image upload if provided (MODIFIED)
        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($livestock->image_url) {
                $oldImagePath = str_replace(asset('storage/'), '', $livestock->image_url);
                Storage::disk('public')->delete($oldImagePath);
            }

            $imagePath = $request->file('image')->store('livestock_images', 'public');
            $validatedData['image_url'] = asset("storage/$imagePath");
        }

        // Update the livestock record
        $livestock->update($validatedData);

        // Return the updated livestock as a JSON response
        return response()->json($livestock);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livestock $livestock)
    {
        // Delete the image from storage if exists (MODIFIED)
        if ($livestock->image_url) {
            $imagePath = str_replace(asset('storage/'), '', $livestock->image_url);
            Storage::disk('public')->delete($imagePath);
        }

        // Delete the livestock record
        $livestock->delete();

        // Return a success response with no content
        return response()->json(null, 204); // 204 status code means "No Content"
    }
}
