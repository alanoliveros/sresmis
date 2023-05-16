<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyAttendance extends Model
{
    protected $fillable = ['studentId', 'school_year', 'teacherId', 'gradeLevelId', 'date'];
}
