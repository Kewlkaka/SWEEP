<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sweephistories extends Model
{
    use HasFactory;
    protected $table = 'sweep_histories';


    protected $fillable = [
        'sw_sweep_assignment_id ',
        'sw_emp_id ',
        'sw_student_id ',
        'sw_sweep_tokens',
    ];
}
