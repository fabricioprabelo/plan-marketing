<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function token(Request $request)
    {
        $token = $request->user()->createToken('token');

        return response()->json([
            'error' => 'false',
            'data' => ['token' => $token->plainTextToken],
            'message' => ''
        ]);
    }

    /**
     * Handle an authentication attempt.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $token = $request->user()->createToken('token');

            return response()->json([
                'error' => false,
                'data' => ['token' => $token->plainTextToken],
                'message' => ''
            ]);
        }

        return response()->json([
            'error' => true,
            'data' => $request->all(),
            'message' => 'The provided credentials do not match our records.',
        ], 401);
    }
}
