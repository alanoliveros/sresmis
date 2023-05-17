<?php

namespace App\Models;

use Database\Factories\SectionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'section_name',
        'grade_lvl_id',
    ];
    protected static function newFactory()
    {
        return SectionFactory::new();
    }
}
