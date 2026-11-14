<?php

namespace Database\Seeders;

use App\Models\JadwalWawancara;
use App\Models\Pendaftar;
use Illuminate\Database\Seeder;

class JadwalWawancaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (JadwalWawancara::count() > 0) {
            return;
        }

        $pendaftarTariq = Pendaftar::where('name', 'like', '%Tariq%')->first();
        $pendaftarAlya = Pendaftar::where('name', 'like', '%Alya%')->first();
        $pendaftarFajar = Pendaftar::where('name', 'like', '%Fajar%')->first();
        $pendaftarSekar = Pendaftar::where('name', 'like', '%Sekar%')->first();

        $slots = [
            // Jumat, 13 Nov 2026
            [
                'tanggal' => '2026-11-13',
                'jam_mulai' => '09:00',
                'jam_selesai' => '09:15',
                'pewawancara' => 'Dwi Putri Lestari & Rizky Aditya',
                'durasi_menit' => 15,
                'kuota' => 1,
                'mode' => 'Offline',
                'lokasi' => 'Ruang Diskusi KMID, Sekolah Vokasi UGM',
                'status' => 'Terisi',
                'pendaftar_id' => $pendaftarTariq ? $pendaftarTariq->id : null,
            ],
            [
                'tanggal' => '2026-11-13',
                'jam_mulai' => '09:15',
                'jam_selesai' => '09:30',
                'pewawancara' => 'Dwi Putri Lestari & Rizky Aditya',
                'durasi_menit' => 15,
                'kuota' => 1,
                'mode' => 'Offline',
                'lokasi' => 'Ruang Diskusi KMID, Sekolah Vokasi UGM',
                'status' => 'Terisi',
                'pendaftar_id' => $pendaftarAlya ? $pendaftarAlya->id : null,
            ],
            [
                'tanggal' => '2026-11-13',
                'jam_mulai' => '09:30',
                'jam_selesai' => '09:45',
                'pewawancara' => 'Dwi Putri Lestari & Rizky Aditya',
                'durasi_menit' => 15,
                'kuota' => 1,
                'mode' => 'Offline',
                'lokasi' => 'Ruang Diskusi KMID, Sekolah Vokasi UGM',
                'status' => 'Terisi',
                'pendaftar_id' => $pendaftarFajar ? $pendaftarFajar->id : null,
            ],
            [
                'tanggal' => '2026-11-13',
                'jam_mulai' => '09:45',
                'jam_selesai' => '10:00',
                'pewawancara' => 'Dwi Putri Lestari & Rizky Aditya',
                'durasi_menit' => 15,
                'kuota' => 1,
                'mode' => 'Offline',
                'lokasi' => 'Ruang Diskusi KMID, Sekolah Vokasi UGM',
                'status' => 'Tersedia',
                'pendaftar_id' => null,
            ],

            // Senin, 16 Nov 2026
            [
                'tanggal' => '2026-11-16',
                'jam_mulai' => '09:00',
                'jam_selesai' => '09:15',
                'pewawancara' => 'Dwi Putri Lestari & Rizky Aditya',
                'durasi_menit' => 15,
                'kuota' => 1,
                'mode' => 'Online',
                'lokasi' => 'https://meet.google.com/kmid-oprec-interview',
                'status' => 'Terisi',
                'pendaftar_id' => $pendaftarSekar ? $pendaftarSekar->id : null,
            ],
            [
                'tanggal' => '2026-11-16',
                'jam_mulai' => '09:15',
                'jam_selesai' => '09:30',
                'pewawancara' => 'Dwi Putri Lestari & Rizky Aditya',
                'durasi_menit' => 15,
                'kuota' => 1,
                'mode' => 'Online',
                'lokasi' => 'https://meet.google.com/kmid-oprec-interview',
                'status' => 'Tersedia',
                'pendaftar_id' => null,
            ],
            [
                'tanggal' => '2026-11-16',
                'jam_mulai' => '09:30',
                'jam_selesai' => '09:45',
                'pewawancara' => 'Dwi Putri Lestari & Rizky Aditya',
                'durasi_menit' => 15,
                'kuota' => 1,
                'mode' => 'Online',
                'lokasi' => 'https://meet.google.com/kmid-oprec-interview',
                'status' => 'Tersedia',
                'pendaftar_id' => null,
            ],
            [
                'tanggal' => '2026-11-16',
                'jam_mulai' => '09:45',
                'jam_selesai' => '10:00',
                'pewawancara' => 'Dwi Putri Lestari & Rizky Aditya',
                'durasi_menit' => 15,
                'kuota' => 1,
                'mode' => 'Online',
                'lokasi' => 'https://meet.google.com/kmid-oprec-interview',
                'status' => 'Dibatalkan',
                'pendaftar_id' => null,
            ],
        ];

        foreach ($slots as $slot) {
            JadwalWawancara::create($slot);
        }
    }
}
