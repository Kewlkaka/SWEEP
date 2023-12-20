<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SweepHistory; 

class NotificationsController extends Controller
{
    public function createNotification()
    {
        $employee= session()->get('employee');
        $emp_id = $employee['id'];
        // Extract emp_id, student_id, and message from the request
        $sweephistory = SweepHistory::where('sw_emp_id', $emp_id)->get();
        $sweephistory=$sweephistory->last();

        $studentId = $sweephistory['sw_student_id'];

        $message = "Would you please accept our request?";

        // Create a new notification entry
        Notification::create([
            'emp_id' => $emp_id,
            'student_id' => $studentId,
            'message' => $message
        ]);

        // You can return a response if needed
        return response()->json(['success' => true, 'message' => 'Notification created successfully']);
    }
}

//script of ajax request 
// fetch('/create-notification', {
//     method: 'POST',
//     headers: {
//         'Content-Type': 'application/json',
//         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
//     },
// })
// .then(response => response.json())
// .then(data => {
//     console.log(data.message); // Log the response message
//     // You can update the UI or perform any other actions here
// })
// .catch(error => console.error('Error:', error));