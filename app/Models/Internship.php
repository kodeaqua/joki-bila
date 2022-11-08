<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'student_id',
        'telp',
        'birth',
        'religion',
        'occupational',
        'address',
        'members',
        'purpose',
        'description',
        'location',
        'institution',
        'letter_number',
        'acc_reason',
        'start_intern',
        'end_intern'
    ];
}
