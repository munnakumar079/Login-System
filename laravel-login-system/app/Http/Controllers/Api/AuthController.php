<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ✅ REGISTER
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 🔐 JWT Token create
        $token = auth('api')->login($user);

        return response()->json([
            'status' => true,
            'message' => 'User registered successfully',
            'token' => $token,
            'user' => $user
        ], 201);
    }

    // ✅ LOGIN
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid login details'
            ], 401);
        }

        return response()->json([
            'status' => true,
            'message' => 'Login successful',
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    // ✅ PROFILE (Protected)
    public function profile()
    {
        return response()->json([
            'status' => true,
            'user' => auth('api')->user()
        ]);
    }

    // ✅ LOGOUT
    public function logout()
    {
        auth('api')->logout();

        return response()->json([
            'status' => true,
            'message' => 'Logged out successfully'
        ]);
    }
}
