<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = Auth::attempt($data);
        if (!$user) {
            return response()->json([
                'message' => 'Invalid credentials',
                'success' => false,
            ], 401);
        }
        // Generate a new token for the user
        $token = Auth::user()->createToken('csit')->plainTextToken;
        return response()->json([
            'message' => 'Login successful',
            'success' => true,
            'token' => $token,
        ]);
    }
}
