<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function RegistrationPage()
    {
        return view('pages.auth.registration-page');
    }

    public function LoginPage()
    {
        return view('pages.auth.login-page');
    }

    public function UserRegistration(Request $request)
    {
        try {
            User::create([
                'fullName' => $request->input('fullName'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'password' => $request->input('password'),
                'role' => 'employee',
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'User created successfully',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'faild',
                'message' => $e->getMessage(), // for development purpose
                // 'message' => 'User Registration Failed' // for production purpose
            ]);
        }
    }

    public function UserLogin(Request $request)
    {
        $count = User::where('email', $request->input('email'))
            ->where('password', $request->input('password'))
            ->select('id', 'fullName', 'role')->first();
        if ($count !== null) {
            $token = JWTToken::CreateToken($request->input('email'), $count->id, $count->role);
            return response()->json([
                'status' => 'success',
                'message' => 'User login successfully',
                'role' => $count->role,
                'user' => $count,
            ])->cookie('token', $token, 3600);
        } else {
            return response()->json([
                'status' => 'faild',
                'message' => 'User login failed',
            ]);

        }
    }

    public function UserProfile(Request $request)
    {
        $email = $request->header('email');
        $user = User::where('email', '=', $email)->first();
        return response()->json([
            'status' => 'success',
            'message' => 'Request Successful',
            'data' => $user,
        ]);
    }

    public function UserLogout(Request $request)
    {
        return redirect('/login')->cookie('token', '', -1);
    }
}
