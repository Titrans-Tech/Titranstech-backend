<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'lname',
        'fname',
        'dob',
        'degree_obtain',
        'school_name',
        'year_graduate',
        'phone',
        'email',
        'course',
        'country',
        'gender',
    ];
}
