<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuarterlySummaryGrade extends Model
{
    protected $fillable = [
        'school_year',
        'admin_id',
        'teacher_id',
        'student_id',
        'subject_id',
        'section_id',
    ]; 
}
