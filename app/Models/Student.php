<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
   
    protected $fillable = [
        'studentId',
        'schoolYearId'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'studentId', 'id');
    }
}
