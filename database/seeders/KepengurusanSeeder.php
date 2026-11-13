<?php

namespace Database\Seeders;

use App\Models\Kepengurusan;
use Illuminate\Database\Seeder;

class KepengurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            [
                'name' => 'Dr. Ir. Tariq Hifzhillah, M.Eng.',
                'email' => null,
                'department' => 'Departemen Teknik Elektro & Informatika · Sekolah Vokasi',
                'group' => 'Pembina Komunitas',
                'position' => 'Dosen Pembina Utama',
                'period' => 'Periode 2025/2026',
                'order' => 1,
                'status' => 'Dipublikasikan',
                'photo_url' => null,
            ],
            [
                'name' => 'Tariq Hifzhillah, S.Kom., M.Cs.',
                'email' => null,
                'department' => 'Subdirektorat Kreativitas Mahasiswa · Ditmawa UGM',
                'group' => 'Pembina Komunitas',
                'position' => 'Penasihat Kemahasiswaan',
                'period' => 'Periode 2025/2026',
                'order' => 2,
                'status' => 'Dipublikasikan',
                'photo_url' => null,
            ],
            [
                'name' => 'Ahmad Tariq Hifzhillah',
                'email' => 'ahmad@mail.ugm.ac.id',
                'department' => 'Teknologi Informasi 2025 · Fakultas Teknik',
                'group' => 'Badan Pengurus Harian (BPH)',
                'position' => 'Ketua Umum',
                'period' => 'Periode 2025/2026',
                'order' => 3,
                'status' => 'Dipublikasikan',
                'photo_url' => null,
            ],
            [
                'name' => 'Ahmad Tariq Hifzhillah',
                'email' => 'ahmad@mail.ugm.ac.id',
                'department' => 'Teknologi Rekayasa Perangkat Lunak 2025 · Sekolah Vokasi',
                'group' => 'Koordinator Divisi',
                'position' => 'Koordinator Media Creative',
                'period' => 'Periode 2025/2026',
                'order' => 4,
                'status' => 'Draf',
                'photo_url' => null,
            ],
        ];

        foreach ($members as $member) {
            Kepengurusan::updateOrCreate(
                [
                    'name' => $member['name'],
                    'position' => $member['position'],
                    'group' => $member['group'],
                ],
                $member
            );
        }
    }
}
