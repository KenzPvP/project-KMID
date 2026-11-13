<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $table = 'pendaftars';

    protected $fillable = [
        'name',
        'nim',
        'major',
        'email',
        'phone_number',
        'division',
        'cv_url',
        'status',
        'motivation',
        'interview_date',
        'interview_time',
    ];
}
