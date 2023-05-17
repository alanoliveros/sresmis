<?php

namespace App\Models;

use Database\Factories\SectionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'adminId',
        'sectionName',
        'gradeLevelId',
    ];
    protected static function newFactory()
    {
        return SectionFactory::new();
    }
}
