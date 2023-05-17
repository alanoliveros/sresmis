<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    // Define the table name if different from "addresses"
    protected $table = 'addresses';

    // Define the fillable attributes
    protected $fillable = [
        'userId',
        'purok',
        'barangay',
        'city',
        'province',
        'zipCode',
    ];
}
