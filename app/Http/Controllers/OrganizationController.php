<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    //
    public function create(Request $request)
    {
            $formFields = $request->validate([
                'org_email' => 'required|email|unique:organizations',
                'org_password' => 'required|confirmed|min:6',
                'org_name'=>'required|min:3',
                'org_desc'=>'required',
                'org_industry_id'=>'required',
                'org_country_id'=>'required',
            ]);

            // $formFields['org_password'] = bcrypt($formFields['org_password']);
            $formFields['org_password'] = $formFields['org_password'];
            
            $organization = Organization::create($formFields);

            return response()->json(['message' => 'Organization created successfully', 'data' => $organization]);
    }
}
