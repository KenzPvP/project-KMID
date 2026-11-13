<?php

namespace Database\Seeders;

use App\Models\Pendaftar;
use Illuminate\Database\Seeder;

class PendaftarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $candidates = [
            [
                'name' => 'Ahmad Tariq Hifzhillah',
                'nim' => '25/512345/SV/22345',
                'major' => 'Teknologi Rekayasa Perangkat Lunak',
                'email' => 'ahmad.tariq.h@mail.ugm.ac.id',
                'phone_number' => '0812-3456-7890',
                'division' => 'Teknologi',
                'cv_url' => 'https://example.com/cv/tariq.pdf',
                'status' => 'Lolos Wawancara',
                'motivation' => 'Ingin berkontribusi dalam pengembangan teknologi KMID.',
                'interview_date' => '13 Nov 2026',
                'interview_time' => '09.00-09.15 WIB',
            ],
            [
                'name' => 'Alya Salsabila',
                'nim' => '25/512348/PA/22348',
                'major' => 'Ilmu Komputer',
                'email' => 'alya.salsabila@mail.ugm.ac.id',
                'phone_number' => '0813-2345-6789',
                'division' => 'Riset & Inovasi',
                'cv_url' => 'https://example.com/cv/alya.pdf',
                'status' => 'Diterima',
                'motivation' => 'Tertarik pada riset inovasi AI dan pendidikan.',
                'interview_date' => '13 Nov 2026',
                'interview_time' => '09.15-09.30 WIB',
            ],
            [
                'name' => 'Arif Rahman Hakim',
                'nim' => '25/512352/PA/22352',
                'major' => 'Ilmu Komputer',
                'email' => 'arif.rahman.h@mail.ugm.ac.id',
                'phone_number' => '0812-9876-5432',
                'division' => 'Humas',
                'cv_url' => 'https://example.com/cv/arif.pdf',
                'status' => 'Lolos Berkas',
                'motivation' => 'Ingin memperluas jangkauan relasi dan kemitraan KMID.',
                'interview_date' => null,
                'interview_time' => null,
            ],
            [
                'name' => 'Bagas Pratama',
                'nim' => '25/512351/SV/22351',
                'major' => 'Teknologi Rekayasa Perangkat Lunak',
                'email' => 'bagas.pratama@mail.ugm.ac.id',
                'phone_number' => '0857-1234-5678',
                'division' => 'Teknologi',
                'cv_url' => 'https://example.com/cv/bagas.pdf',
                'status' => 'Mendaftar',
                'motivation' => 'Belajar dan berkontribusi membuat web application aplikatif.',
                'interview_date' => null,
                'interview_time' => null,
            ],
            [
                'name' => 'Dimas Aditya Pratama',
                'nim' => '25/512347/SV/22347',
                'major' => 'Teknologi Rekayasa Perangkat Lunak',
                'email' => 'dimas.aditya.p@mail.ugm.ac.id',
                'phone_number' => '0821-4567-8901',
                'division' => 'Teknologi',
                'cv_url' => 'https://example.com/cv/dimas.pdf',
                'status' => 'Lolos Berkas',
                'motivation' => 'Tertarik mendalami pengembangan frontend dan backend.',
                'interview_date' => null,
                'interview_time' => null,
            ],
            [
                'name' => 'Fajar Muhammad Rizki',
                'nim' => '25/512349/SV/22349',
                'major' => 'Teknologi Rekayasa Perangkat Lunak',
                'email' => 'fajar.m.rizki@mail.ugm.ac.id',
                'phone_number' => '0878-5678-9012',
                'division' => 'Humas',
                'cv_url' => 'https://example.com/cv/fajar.pdf',
                'status' => 'Tidak Lolos',
                'motivation' => 'Ingin belajar public relation di ranah teknologi.',
                'interview_date' => '13 Nov 2026',
                'interview_time' => '09.30-09.45 WIB',
            ],
            [
                'name' => 'Nadia Putri Maharani',
                'nim' => '25/512346/PA/22346',
                'major' => 'Ilmu Komputer',
                'email' => 'nadia.putri.m@mail.ugm.ac.id',
                'phone_number' => '0813-8765-4321',
                'division' => 'Media Kreatif',
                'cv_url' => 'https://example.com/cv/nadia.pdf',
                'status' => 'Mendaftar',
                'motivation' => 'Passion di desain grafis, ilustrasi, dan UI/UX.',
                'interview_date' => null,
                'interview_time' => null,
            ],
            [
                'name' => 'Sekar Ayu Wulandari',
                'nim' => '25/512350/PA/22350',
                'major' => 'Ilmu Komputer',
                'email' => 'sekar.ayu.w@mail.ugm.ac.id',
                'phone_number' => '0856-7890-1234',
                'division' => 'Media Kreatif',
                'cv_url' => 'https://example.com/cv/sekar.pdf',
                'status' => 'Lolos Berkas',
                'motivation' => 'Mengembangkan kemampuan desain publikasi dan branding.',
                'interview_date' => '16 Nov 2026',
                'interview_time' => '09.00-09.15 WIB',
            ],
        ];

        foreach ($candidates as $candidate) {
            Pendaftar::updateOrCreate(
                ['nim' => $candidate['nim']],
                $candidate
            );
        }
    }
}
