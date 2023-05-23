<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentReportCardCoreValues extends Model
{
    protected $fillable = [
        'admin_id',
        'teacher_id',
        'student_id',
        'school_year',
        'core_values',
        'quarter_1',
        'quarter_2',
        'quarter_3',
        'quarter_4',
    ];
    
}
