<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $table = 'organizations';

    protected $fillable = [
        'org_name',
        'org_desc',
        'org_industry_id',
        'org_country_id',
        'org_email',
        'org_password',
    ];
}
