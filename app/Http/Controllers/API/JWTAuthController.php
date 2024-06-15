<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTAuthController extends Controller
{
    /**
     * Register a User.
     */
    public function register(Request $request)
    {

        // First, check if the email is already in use
        if (User::where('email', $request->email)->exists()) {
            return response()->json(['error' => 'Email already in use'], 409); // 409 Conflict
        }

        $validator = Validator::make($request->all(), [
            'username' => 'required|between:2,100',
            'email' => 'required|email|unique:users|max:50',
            'password' => 'required|confirmed|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = JWTAuth::fromUser($user);

        return $this->createNewToken($token);
    }

    /**
     * Get a JWT via given credentials.
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = auth()->user(); // Get the authenticated user
        $token = JWTAuth::fromUser($user); // Generate a token for the user

        return $this->createNewToken($token);
    }

    /**
     * Refresh a token.
     */
    public function refresh()
    {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     */
    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}