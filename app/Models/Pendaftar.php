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
        'portfolio_url',
        'status',
        'motivation',
        'interview_date',
        'interview_time',
    ];

    /**
     * Relasi ke slot wawancara.
     */
    public function jadwalWawancara()
    {
        return $this->hasOne(JadwalWawancara::class, 'pendaftar_id');
    }
}
