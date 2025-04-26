<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource with pagination.
     */
    public function index()
    {
        $users = User::paginate(10); // Paginate results (10 per page)
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => ['nullable', Rule::in(['admin', 'farmer', 'user'])], // Example role validation
        ]);

        // Hash the password before saving
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Create a new user
        $user = User::create($validatedData);

        // Return the created user as a JSON response
        return response()->json($user, 201); // 201 status code means "Created"
    }

    /**
     * Display the specified resource.
     */
    public function getUser()
    {
        // Find user or return 404
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => ['sometimes', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            'password' => 'sometimes|string|min:8',
            'role' => ['nullable', Rule::in(['admin', 'farmer', 'user'])], // Example role validation
        ]);

        // Hash the password if it's being updated
        if ($request->has('password')) {
            $validatedData['password'] = Hash::make($request->password);
        }

        // Update the user
        $user->update($validatedData);

        // Return the updated user as a JSON response
        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Delete the user
        $user->delete();

        // Return a success response with no content
        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}
