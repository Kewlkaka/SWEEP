<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'emp_name',
        'emp_desc',
        'emp_org_name',
        'emp_position',
        'emp_country_id',
        'emp_work_experience',
        'emp_gender',
        'emp_industry_id',
        'emp_email',
        'emp_password',
    ];
}
