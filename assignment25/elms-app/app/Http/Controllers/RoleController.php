<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Exception;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function AddRole()
    {
        return view('pages.auth.add-role');
    }

    public function CreateRole(Request $request)
    {
        try {
            Role::create([
                'name' => $request->input('name'),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Role created successfully',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'faild',
                'message' => $e->getMessage(), // for development purpose
                // 'message' => 'User Registration Failed' // for production purpose
            ]);
        }
    }

    public function RoleList(Request $request)
    {
        return Role::all();
    }
}
