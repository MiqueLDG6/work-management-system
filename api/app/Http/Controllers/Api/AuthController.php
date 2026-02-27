<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Esto es lo que busca Laravel: compara email + password con la DB
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {  // <--- Aquí está Auth::attempt
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $user = Auth::user(); // obtiene el usuario autenticado

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logged out']);
    }
}
