<?php

namespace App\Http\Controllers;

use App\Models\LeaveCategory;
use Exception;
use Illuminate\Http\Request;

class LeaveCategoryController extends Controller
{
    public function LeaveCategory()
    {
        return view('pages.dashboard.admin.leave-category');
    }

    public function CreateLeaveCategory(Request $request)
    {
        try {
            LeaveCategory::create([
                'name' => $request->input('name'),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Leave Category created successfully',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'faild',
                'message' => $e->getMessage(), // for development purpose
                // 'message' => 'User Registration Failed' // for production purpose
            ]);
        }
    }

    public function LeaveCategoryList()
    {
        return LeaveCategory::get()->all();
    }
}
