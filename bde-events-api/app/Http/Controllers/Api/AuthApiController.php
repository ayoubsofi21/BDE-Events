<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthApiController extends Controller
{
    public function __construct(
        private AuthService $authService
    ) {
    }
    
    public function register(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email'
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed'
            ],
        ]);

        $result = $this->authService->register($validated);

        return response()->json([
            'success' => true,
            'message' => 'Account created successfully.',
            'data' => $result,
        ], 201);
    }

    public function login(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $result = $this->authService->login($credentials);

        return response()->json([
            'success' => true,
            'message' => 'Login successful.',
            'data' => $result,
        ]);
    }
    public function logout(Request $request): JsonResponse
    {
        $this->authService->logout(
            $request->user()
        );

        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully.',
        ]);
    }

    public function me(Request $request): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => [
                'user' => $request->user(),
            ],
        ]);
    }
}