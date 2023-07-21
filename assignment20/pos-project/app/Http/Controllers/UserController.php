<?php

namespace App\Http\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function UserRegister(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'mobile' => 'required|string|max:11',
            'password' => 'required|string|min:6',
        ]);

        $user = new User([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => $request->password,
        ]);

        $user->save();

        return response()->json(['message' => 'User registered successfully']);
    }

    public function UserLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = $this->attemptLogin($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        return response()->json(['token' => $token]);
    }

    protected function attemptLogin(array $credentials)
    {
        $key = env('JWT_KEY');
        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !$credentials['password']) {
            return null;
        }

        $payload = [
            'sub' => $user->id,
            'iat' => time(),
            'exp' => time() + (60 * 60), // Token expiration time (1 hour)
        ];

        return JWT::encode($payload, $key, 'HS256');
    }

    public function logout()
    {
        // Implement your logout logic here (if needed)
    }
}
