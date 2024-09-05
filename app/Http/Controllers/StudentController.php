<?php

namespace App\Http\Controllers;

use App\Models\LevelsOfEducation;
use App\Models\Program;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function create(Request $request)
    {
        $formFields = $request->validate([
            'student_email' => 'required|email|unique:students',
            'student_password' => 'required|confirmed|min:6',
            'student_name'=>'min:3',
            'student_desc'=>'required',
            'student_university_name'=>'required',
            'student_gender'=>'required',
            'student_program_id'=>'required',
            'student_level_of_education_id'=>'required',
            'student_current_year'=>'required',
            'student_work_experience'=>'required',
            'student_country_id'=>'required',
            'student_dob'=>'required',
        ]);

        $formFields['student_program_id'] = intval($formFields['student_program_id']);
        $formFields['student_level_of_education_id'] = intval($formFields['student_level_of_education_id']);
        $formFields['student_country_id'] = intval($formFields['student_country_id']);
        // $formFields['student_password'] = bcrypt($formFields['student_password']);
        //$formFields['student_password'] = $formFields['student_password'];

        $student = Student::create($formFields);

        return response()->json(['message' => 'Student created successfully', 'data' => $student]);
    }

    public function dashboard(){
        return view('users.student-dashboard');
    }

    public function fetchStudents(Request $request) {
        $student_id = $request->input('studentId');
        $student = Student::where('id', $student_id)->get();
        
        $program_id = $student->first()->student_program_id;
        $program = Program::where('id', $program_id)->get();

        
        $level_of_education_id =$student->first()->student_level_of_education_id;
        $levelofeducation = LevelsOfEducation::where('id', $level_of_education_id )->get();

        return response()->json([
            'message' => 'Student Profile Fetched',
            'student' => $student,
            'program' => $program,
            'levelofeducation'=> $levelofeducation
        ]);
    }
}
