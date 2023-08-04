<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function LoginPage()
    {
        return view('pages.auth.login-page');
    }

    public function RegistrationPage()
    {
        return view('pages.auth.registration-page');
    }

    public function ProfilePage()
    {
        return view('pages.dashboard.profile-page');
    }

    public function UserRegistration(Request $request)
    {
        try {
            User::create([
                'firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'address' => $request->input('address'),
                'password' => $request->input('password'),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'User created successfully',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'User Registration Failed'
            ]);
        }
    }

    public function UserLogin(Request $request)
    {
        $count = User::where('email', $request->input('email'))
            ->where('password', $request->input('password'))
            ->select('id', 'firstName', 'lastName')->first();
        if ($count !== null) {
            $token = JWTToken::CreateToken($request->input('email'), $count->id);
            return response()->json([
                'status' => 'success',
                'message' => 'User login successfully',
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
