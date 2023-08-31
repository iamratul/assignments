<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function LeavePage()
    {
        return view('pages.dashboard.employee.leave-page');
    }

    public function LeaveRequestPage()
    {
        return view('pages.dashboard.admin.leave-page');
    }

    public function createLeaveRequest(Request $request)
    {
        $user_id = $request->header('id');
        return Leave::create([
            'user_id' => $user_id,
            'leave_category_id' => $request->input('leave_category_id'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'reason' => $request->input('reason'),
            'status' => 'pending',
        ]);
    }

    public function LeaveRequestList(Request $request)
    {
        $user_id = $request->header('id');
        return Leave::with('category')->where('user_id', $user_id)->get();
    }
    public function AdminLeaveRequestList(Request $request)
    {
        return Leave::with('category')->get();
    }

    public function LeaveRequestById(Request $request)
    {
        $request_id = $request->input('id');
        return Leave::where('id', $request_id)->first();
    }

    public function UpdateLeaveRequest(Request $request)
    {
        return Leave::where('id', $request->input('id'))->update([
            'leave_category_id' => $request->input('leave_category_id'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'reason' => $request->input('reason'),
            'status' => $request->input('status'),
        ]);
    }

    public function DeleteLeaveRequest(Request $request)
    {
        $request_id = $request->input('id');
        return Leave::where('id', $request_id)->delete();
    }
}
