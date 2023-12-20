<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\SweepAssignment;

class SweepController extends Controller
{
    //
    public function createTask(Request $request)
{
    $employee= session()->get('employee');
    $emp_id = $employee['id'];
    $formFields= ['sw_emp_id' => $emp_id];
 
    $formFields = array_merge($formFields, $request->validate([
        'sw_title' => 'required|string',
        'sw_detail' => 'nullable|string',
        'sw_compensation_proposed' => 'required|in:Yes,No',
        'sw_student_program_req_id'=>'required',
        'sw_complexity'=>'required|string',
        'sw_student_prior_experience_req' => 'required|in:Yes,No',
        'sw_student_country_req_id' => 'required|exists:countries,id',
        'sw_deadline' => 'required|date',
    ]));

    $formFields['sw_student_program_req_id'] = intval($formFields['sw_student_program_req_id']);
    $formFields['sw_student_country_req_id'] = intval($formFields['sw_student_country_req_id']);

    $formFields = array_slice($formFields, 0, -1, true) +
    ['sw_status' => 'incomplete'] +
    array_slice($formFields, -1, null, true);
    //dd($formFields);

    $sweepAssignment = SweepAssignment::create($formFields);
    //dd($sweepAssignment);

    
    $matchingStudents = Student::where('student_program_id', $formFields['sw_student_program_req_id'])
    ->where('student_country_id', $formFields['sw_student_country_req_id'])
    ->where('student_work_experience', '>', 0)
    ->get();

    $matchingStudentsData = $matchingStudents->map(function ($student) {
        return [
            'id' => $student->id,
            'name' => $student->student_name, 
        ];
    });

    return response()->json([
        'message' => 'Task created successfully',
        'sweepAssignment' => $sweepAssignment, 
        'matchingStudents' => $matchingStudentsData,
    ]);
}
}
