<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'student_name',
        'student_desc',
        'student_university_name',
        'student_gender',
        'student_program_id',
        'student_level_of_education_id',
        'student_current_year',
        'student_work_experience',
        'student_country_id',
        'student_dob',
        'student_email',
        'student_password',
    ];
}
