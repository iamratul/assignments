<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        try {
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'User created successfully',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'faild',
                'message' => 'User Registration Failed',
            ]);
        }
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $count = User::where('email', $request->input('email'))
            ->where('password', $request->input('password'))
            ->select('id')->first();

        if ($count !== null) {
            $token = JWTToken::CreateToken($request->input('email'), $count->id);
            return response()->json([
                'status' => 'success',
                'message' => 'User login successfully',
            ])->cookie('token', $token, 3600);
        } else {
            return response()->json([
                'status' => 'faild',
                'message' => 'User login failed',
            ]);
        }
    }
}
