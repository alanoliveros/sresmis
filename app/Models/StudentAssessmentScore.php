<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAssessmentScore extends Model
{
    protected $fillable = [
        'sy',
        'admin_id',
        'teacher_id',
        'student_id',
        'subject_id',
        'quarter_id',
    ]; 
}
