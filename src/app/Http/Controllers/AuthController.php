<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        return response()->json([
            'message' => 'register ok'
        ]);
    }

    public function login(LoginRequest $request)
    {
        return response()->json([
            'message' => 'login ok'
        ]);
    }
}
