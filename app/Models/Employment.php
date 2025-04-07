<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'zip',
        'country',
        'position_applied',
        'start_date',
        'salary_expectation',
        'education_level',
        'edu_start_date',
        'edu_end_date',
        'eduction_file',
        'company',
        'position_held',
        'job_description',
        'job_start_date',
        'job_end_date',
        'company2',
        'position_held2',
        'job_description2',
        'job_start_date2',
        'job_end_date2',
        'company3',
        'position_held3',
        'job_description3',
        'job_start_date3',
        'job_end_date3',
        'hard_skill1',
        'hard_skill2',
        'hard_skill3',
        'hard_skill4',
        'hard_skill5',
        'soft_skill1',
        'soft_skill2',
        'soft_skill3',
        'soft_skill4',
        'soft_skill5',
        'elegible',
        'convicted',
        'mental_stable',
        'job_experience',
        'bank_name',
        'bank_account_number',
        'bank_account_type',
        'ifsc_code',
        'bank_account_name',
        'bank_branch',
        'identification',
        'identification_address',
        'signature',
        'ref_no',
        'status',

    ];
    protected $casts = [
        'eduction_file' => 'array',
    ];
}
