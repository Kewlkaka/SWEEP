<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SweepAssignment extends Model
{
    use HasFactory;

    protected $table = 'sweep_assignments';
    
    protected $fillable = [
        'sw_emp_id',
        'sw_title',
        'sw_detail',
        'sw_compensation_proposed',
        'sw_student_program_req_id',
        'sw_complexity',
        'sw_student_prior_experience_req',
        'sw_student_country_req_id',
        'sw_status',
        'sw_deadline',
    ];
}
