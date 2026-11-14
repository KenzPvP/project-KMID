<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalWawancara extends Model
{
    use HasFactory;

    protected $table = 'jadwal_wawancaras';

    protected $fillable = [
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'pewawancara',
        'durasi_menit',
        'kuota',
        'mode',
        'lokasi',
        'status',
        'pendaftar_id',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'durasi_menit' => 'integer',
        'kuota' => 'integer',
    ];

    /**
     * Relasi ke Pendaftar yang mengambil slot ini.
     */
    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class, 'pendaftar_id');
    }

    /**
     * Format jam wawancara (e.g. 09.00-09.15 WIB)
     */
    public function getJamRangeAttribute()
    {
        $mulai = str_replace(':', '.', substr($this->jam_mulai, 0, 5));
        $selesai = str_replace(':', '.', substr($this->jam_selesai, 0, 5));
        return "{$mulai}-{$selesai} WIB";
    }

    /**
     * Format tanggal Indonesia (e.g. Jumat, 13 November 2026)
     */
    public function getTanggalIndoAttribute()
    {
        if (!$this->tanggal) return '-';
        return Carbon::parse($this->tanggal)->locale('id')->isoFormat('dddd, D MMMM Y');
    }

    /**
     * Format tanggal pendek Indonesia (e.g. 13 Nov 2026)
     */
    public function getTanggalPendekAttribute()
    {
        if (!$this->tanggal) return '-';
        return Carbon::parse($this->tanggal)->locale('id')->isoFormat('D MMM Y');
    }
}
