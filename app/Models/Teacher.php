<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    // Define the table name if different from "teachers"
    protected $table = 'teachers';

    // Define the fillable attributes
    protected $fillable = [
        'adminId',
        'teacherId',
        'school_year',
        'sectionId',
        'gradeLevelId',
        'addressId',
        'designation',
        'employeeNumber',
        'position',
        'fundSource',
        'degree',
        'major',
        'minor',
        'totalTeachingTimePerWeek',
        'numberOfAncillary',
    ];

}
