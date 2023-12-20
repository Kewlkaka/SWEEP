<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Employee;
use App\Models\Organization;
use App\Models\Program;
use App\Models\LevelsOfEducation;
use App\Models\Industry;
use App\Models\Country;
use App\Models\SweepHistory;

class LoginController extends Controller
{

    public function index(){
        if(session()->has('usertype')){
            $country=session()->get('country');
            $program=session()->get('program');
            if(session()->get('usertype')=='student'){
                $student=session()->get('student');
                $levelofeducation=session()->get('levelofeducation');
                return view('users.student-dashboard',compact('student','country','program','levelofeducation'));
            }
            else if(session()->get('usertype')=='organization'){
                $organization=session()->get('organization');
                $industry=session()->get('industry');
                return view('organization.dashboard',compact('organization','country','program','industry'));
            }
            else if(session()->get('usertype')=='employee'){
                $employee=session()->get('employee');
                $industry=session()->get('industry');
                $sweephistories=session()->get('sweephistories');
                return view('employee.dashboard',compact('employee','country','program','industry', 'sweephistories'));
            }
        }else{
        return view('users.login');  
        }     
    }

    function login(Request $request){
        $email=$request->input('email');
        $password=$request->input('password');
        
        if(empty($email)||empty($password)){
            echo "<script>alert('Please fill the fields')</script>";
            return view('users.login');

        }
        $student= Student::where('student_email',$email)->where('student_password',$password)->first();
        $organization= Organization::where('org_email',$email)->where('org_password',$password)->first();
        $employee= Employee::where('emp_email',$email)->where('emp_password',$password)->first();


        if($student){
            $country=Country::where('id',$student['student_country_id'])->first();
            $program=Program::where('id',$student['student_program_id'])->first();
            $levelofeducation=LevelsOfEducation::where('id',$student['student_level_of_education_id'])->first();
            $request->session()->put('student',$student);
            $request->session()->put('country',$country);
            $request->session()->put('program',$program);
            $request->session()->put('levelofeducation',$levelofeducation);
            $request->session()->put('usertype','student');
            return view('users.student-dashboard',compact('student','country','program','levelofeducation'));
        }
        else if($organization){
            $country=Country::where('id',$organization['org_country_id'])->first();
            $program=Program::where('id',$organization['org_program_id'])->first();
            $industry=Industry::where('id',$organization['org_industry_id'])->first();
            $request->session()->put('organization',$organization);
            $request->session()->put('country',$country);
            $request->session()->put('program',$program);
            $request->session()->put('industry',$industry);
            $request->session()->put('usertype','organization');
            return view('users.dashboard',compact('organization','country','program','industry'));
        }
        else if($employee){
            $sweephistories = SweepHistory::join('sweep_assignments', 'sweep_histories.sw_sweep_assignment_id', '=', 'sweep_assignments.id')->select('sweep_histories.*', 'sweep_assignments.sw_status')->where('sweep_histories.sw_emp_id', $employee['id'])->get();
            $request->session()->put('sweephistories',$sweephistories);
            $country=Country::where('id',$employee['emp_country_id'])->first();
            $program=Program::where('id',$employee['emp_program_id'])->first();
            $industry=Industry::where('id',$employee['emp_industry_id'])->first();
            
            $request->session()->put('employee',$employee);
            $request->session()->put('country',$country);
            $request->session()->put('program',$program);
            $request->session()->put('industry',$industry);
            $request->session()->put('sweephistories',$sweephistories);
            
            $request->session()->put('usertype','employee');
            return view('employee.dashboard',compact('employee','country','program','industry','sweephistories'));
        }
        else{
            echo "<script>console.log('{{$password}}');('Credentials do not match ');</script>";
            return view('users.login');
        }

    }
    public function logout(){
        
        session()->flush();
            return redirect('/');
    }
        
}
