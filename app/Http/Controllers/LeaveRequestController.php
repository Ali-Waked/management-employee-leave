<?php

namespace App\Http\Controllers;

use App\Enum\LeaveRequestStatus;
use App\Models\EmployeeLeave;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;

class LeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('leave.leave-request', [
            'leave' => EmployeeLeave::all(),
        ]);
    }
    
    public function update(Request $request, EmployeeLeave $leave)
    {
        $request->validate([
            'leave_request_type' => ['required', new Enum(LeaveRequestStatus::class)],
            'reason' => ["required_if:leave_request_type,{LeaveRequestStatus::DENIED->value}"]
        ]);
        if ($request->leave_request_type == LeaveRequestStatus::ACCEPT->value) {
            $leave->update([
                'status' => strtolower(LeaveRequestStatus::ACCEPT->value),
            ]);
        } else {
            $leave->update([
                'status' => strtolower(LeaveRequestStatus::DENIED->value),
                'reason' => $request->reason,
            ]);
        }
        return to_route('request.leave.index')->with('success', 'change leave status successflly');
    }
}
