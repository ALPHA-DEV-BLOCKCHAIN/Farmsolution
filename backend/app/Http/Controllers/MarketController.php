<?php

namespace App\Http\Controllers;

use App\Models\Market;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $markets = Market::all(); // Fetch all market records
        return response()->json($markets); // Return as JSON response
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
        // Validate the request data, including image
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation (MODIFIED)
        ]);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('market_images', 'public'); // Store image (MODIFIED)
            $validatedData['image_url'] = asset("storage/$imagePath"); // Store public URL
        }

        // Create a new market record
        $market = Market::create($validatedData);

        // Return the created market as JSON response
        return response()->json($market, 201); // 201 status code means "Created"
    }

    /**
     * Display the specified resource.
     */
    public function show(Market $market)
    {
        // Return the specified market as a JSON response
        return response()->json($market);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Market $market)
    {
        // Not needed for APIs
        return response()->json(['message' => 'This method is not used in APIs.'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Market $market)
    {
        // Validate the request data, including image
        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'location' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation (MODIFIED)
        ]);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($market->image_url) {
                $oldImagePath = str_replace(asset('storage/'), '', $market->image_url);
                Storage::disk('public')->delete($oldImagePath);
            }

            $imagePath = $request->file('image')->store('market_images', 'public'); // Store new image (MODIFIED)
            $validatedData['image_url'] = asset("storage/$imagePath");
        }

        // Update the market record
        $market->update($validatedData);

        // Return the updated market as a JSON response
        return response()->json($market);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Market $market)
    {
        // Delete image from storage if exists
        if ($market->image_url) {
            $imagePath = str_replace(asset('storage/'), '', $market->image_url);
            Storage::disk('public')->delete($imagePath); // Delete image file (MODIFIED)
        }

        // Delete the market record
        $market->delete();

        // Return a success response with no content
        return response()->json(null, 204);
    }
}
