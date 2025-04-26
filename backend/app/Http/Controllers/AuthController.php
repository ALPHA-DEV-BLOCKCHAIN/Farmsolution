<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Handle user signup (registration).
     */
    public function signup(Request $request)
    {
        // Validate request data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6|confirmed' // Requires password_confirmation field
        ]);

        // Hash the password before storing it
        $data['password'] = Hash::make($data['password']);

        // Create the user
        $user = User::create($data);

        // Generate a token for the new user
        $token = $user->createToken('auth_token')->plainTextToken;

        // Return JSON response with token and user data
        return response()->json([
            'message' => 'User registered successfully!',
            'user' => $user,
            'token' => $token
        ], 201);
    }
}
