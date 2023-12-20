<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sweepassignments;

class SwAssignmentController extends Controller
{
    public function markAsDone(Request $request)
    {
        $assignmentId = $request->input('assignment_id');

        sweepassignments::where('id', $assignmentId)->update(['sw_status' => 'complete']);
        
        $updatedAssignment = sweepassignments::find($assignmentId);

        return response()->json(['success' => true, 'assignment' => $updatedAssignment]);
    }
}
