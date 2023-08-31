<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Exception;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function LeavePage()
    {
        return view('pages.dashboard.employee.leave-page');
    }

    public function createLeaveRequest(Request $request)
    {
        try{
            $user_id = $request->header('id');
            Leave::create([
                'user_id' => $user_id,
                'leave_category_id' => $request->input('leave_category_id'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'reason' => $request->input('reason'),
                'status' => 'pending',
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Leave request created successfully',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function LeaveRequestList(Request $request)
    {
        $user_id = $request->header('id');
        return Leave::with('category')->where('user_id', $user_id)->get()->all();
    }
}
