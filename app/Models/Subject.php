<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'subjectName',
        'description',
        'written_work_percentage',
        'performance_tasks_percentage',
        'quarterly_assessment_percentage',
    ];

}
