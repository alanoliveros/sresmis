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
    public function user()
    {
        return $this->belongsTo(User::class, 'teacherId');
    }
    public function address()
    {
        return $this->hasOne(Address::class, 'id', 'addressId');
    }
    public function section()
    {
        return $this->belongsTo(Section::class, 'sectionId');
    }
    public function gradeLevel()
    {
        return $this->belongsTo(GradeLevel::class, 'gradeLevelId');
    }

}
