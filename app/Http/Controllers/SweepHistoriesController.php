<?php

namespace App\Http\Controllers;

use App\Models\SweepHistory;
use Illuminate\Http\Request;
use App\Models\SweepAssignment;
use App\Models\Notifications;

class SweepHistoriesController extends Controller
{
    //
    public function store(Request $request) {
        $employee= session()->get('employee');
        $emp_id = $employee['id'];

        $student_id = $request->input('studentId');

        $sweepAssignment = SweepAssignment::where('sw_emp_id', $emp_id)->get();

        $sweepAssignment=$sweepAssignment->last();
        
        if ($sweepAssignment) {
            if ($sweepAssignment->sw_complexity == 'medium') {
                $sweepTokens = 50;
            } elseif ($sweepAssignment->sw_complexity == 'hard') {
                $sweepTokens = 100;
            } else {
                $sweepTokens = 25;
            }
        }

        $sweepHistory = SweepHistory::create([
            'sw_sweep_assignment_id' => $sweepAssignment->id,
            'sw_emp_id' => $emp_id,
            'sw_student_id' => $student_id,
            'sw_sweep_tokens' => $sweepTokens,
            'sw_request_status'=>'pending',
        ]);
        // Extract emp_id, student_id, and message from the request


        $message = "Would you please accept our request?";

        // Create a new notification entry
        Notifications::create([
            'emp_id' => $emp_id,
            'student_id' => $student_id,
            'message' => $message
        ]);


        return response()->json(['message' => 'Task assigned successfully']);
    }

    public function fetchHistories()
    {
        $employee= session()->get('employee');
        $emp_id = $employee['id'];
        //$sweepAssignments = SweepAssignment::where('sw_emp_id', $emp_id)->get();
        $sweepHistories = SweepHistory::where('sw_emp_id', $emp_id)->get();
        $sweepAssignmentIds = $sweepHistories->pluck('sw_sweep_assignment_id')->toArray();
        $sweepAssignments = SweepAssignment::whereIn('id', $sweepAssignmentIds)->get();

        $combinedData = [
            'sweepAssignments' => $sweepAssignments->toArray(),
            'sweepHistories' => $sweepHistories->toArray(),
        ];
    
        return response()->json($combinedData);
    }

    public function updateRequestStatus(Request $request)
    {
        $assignmentId = $request->input('assignment_id');
        $requestStatus = $request->input('request_status');

        SweepHistory::where('id', $assignmentId)->update(['sw_request_status' => $requestStatus]);
        
        $updatedAssignment = SweepAssignment::find($assignmentId);

        return response()->json(['success' => true, 'assignment' => $updatedAssignment]);
    }
    
        
}
