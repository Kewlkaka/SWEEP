<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;

class EmployeeController extends Controller
{
    //
    public function create(Request $request)
    {
            $formFields = $request->validate([
                'emp_email' => 'required|email|unique:employees',
                'emp_password' => 'required|confirmed|min:6',
                'emp_name'=>'required|min:3',
                'emp_desc'=>'required',
                'emp_org_name'=>'required',
                'emp_position'=>'required|min:4',
                'emp_country_id'=>'required',
                'emp_work_experience'=>'required',
                'emp_gender'=>'required',
                'emp_industry_id'=>'required',
            ]);

            // $formFields['emp_password'] = bcrypt($formFields['emp_password']);
            $formFields['emp_password'] = $formFields['emp_password'];
            
            $employee = Employee::create($formFields);

            return response()->json(['message' => 'Employee created successfully', 'data' => $employee]);
    }
}
