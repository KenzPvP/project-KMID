# Catatan Pembaruan (Changelog) - Back-End Project KMID

Dokumen ini merangkum seluruh pembaruan sistem, integrasi backend, dan penyempurnaan UI/UX yang telah diimplementasikan pada branch `back-end`.

---

## 1. Sistem Autentikasi & Multi-Role Access Control
- **Peran Pengguna (RBAC)**:
  - `admin`: Hak akses penuh ke seluruh pengelolaan pendaftar, kepengurusan, konten, dan konfigurasi sistem. Redirect otomatis ke `/admin/kelola-akun`.
  - `staff`: Akses manajerial untuk melihat dan mengelola pendaftar serta jadwal wawancara. Redirect otomatis ke `/staff/kelola-akun`.
  - `pendaftar`: Akses khusus mahasiswa pendaftar ke Portal Oprec Staff KMID (`/open-recruitment`).
- **Registrasi Khusus Mahasiswa**:
  - Alur pendaftaran akun baru khusus untuk role `pendaftar`.
  - Setelah berhasil mendaftar, otomatis diarahkan ke halaman `/login` dengan notifikasi sukses.
- **Validasi Domain Email UGM**:
  - Validasi khusus menggunakan custom rule `UgmEmail` (`@mail.ugm.ac.id` dan `@ugm.ac.id`) pada form login dan registrasi.
- **Profil Dinamis**:
  - Nama dan inisial avatar pada header dashboard otomatis menyesuaikan data akun yang sedang login.

---

## 2. Pengelolaan Pendaftar & Kepengurusan (Admin & Staff)
- **Tambah Pendaftar & Tambah Staff**:
  - Form penambahan akun pendaftar dan staf langsung dari dashboard admin.
  - Otomatis membuat entri `User` dengan kata sandi default/kustom agar akun yang dibuat bisa langsung digunakan untuk login.
- **Manajemen Kepengurusan**:
  - Fitur Tambah Kepengurusan (nama, divisi, jabatan, periode, upload foto).
  - Fitur Edit & Update Kepengurusan yang memungkinkan Admin memperbarui data dan mengganti foto pengurus.

---

## 3. Alur Pendaftaran Open Recruitment (Mahasiswa)
- **Formulir Pendaftaran Multi-Langkah**:
  - Step A: Data Diri Mahasiswa (Nama, NIM, Program Studi).
  - Step B: Pilihan Divisi & Alasan/Motivasi.
  - Step C: Berkas (CV, Portofolio) & Nomor WhatsApp.
- **Navigasi Fleksibel & Tombol Kembali**:
  - Ditambahkan tombol **Kembali** pada Step B (ke Step A) dan Step C (ke Step B).
  - Tombol submit otomatis menyesuaikan (`Kirim Pendaftaran` vs `Simpan & Perbarui Berkas`).
- **Penyederhanaan UI Banner Status**:
  - Desain banner status disederhanakan menjadi strip info ramping dengan hierarki visual yang jelas:
    - *Pendaftar Baru*: Catatan ringkas untuk mengisi berkas dengan teliti.
    - *Menunggu Peninjauan*: Status badge `Mendaftar` dengan informasi berkas sedang ditinjau Admin.
    - *Lolos Berkas*: Pemberitahuan ACC Admin beserta tombol pintas ke jadwal wawancara.

---

## 4. Sistem Persetujuan Admin & Otomasi Jadwal Wawancara
- **Sistem Kunci / Buka Jadwal Wawancara**:
  - Bagian Pengisian Jadwal Wawancara hanya dapat diakses setelah berkas pendaftar disetujui (`Lolos Berkas`, `Lolos Wawancara`, atau `Diterima`).
- **Sinkronisasi Otomatis (*Realtime Polling*)**:
  - Endpoint `/open-recruitment/check-status` memantau status persetujuan di latar belakang.
  - Saat Admin menyetujui berkas pendaftar, dashboard oprec seketika mendeteksi dan langsung beralih ke form jadwal wawancara tanpa perlu refresh manual.
- **Tampilan Default Jadwal Wawancara**:
  - Jika berkas sudah di-ACC, halaman oprec secara default langsung menampilkan form pemilihan jadwal wawancara.
  - Tersedia tombol **`← Kembali ke Formulir Berkas`** jika mahasiswa ingin memeriksa atau memperbarui berkas mereka.
- **Pemilihan Sesi Wawancara**:
  - Tersedia 6 sesi wawancara interaktif (durasi 15 menit per sesi) dengan kartu pilihan dan radio button custom.

---

## 5. Dukungan Cloudflare Tunnel & Reverse Proxy
- **Trusted Proxies (`bootstrap/app.php`)**:
  - Mengonfigurasi `$middleware->trustProxies(at: '*')` agar Laravel memercayai header proxy (`X-Forwarded-Proto` & `X-Forwarded-Host`).
- **Force HTTPS (`AppServiceProvider.php`)**:
  - Memaksa seluruh URL aset (CSS, JS, gambar) menggunakan protokol HTTPS saat diakses melalui tunnel publik (`trycloudflare.com` / `ngrok`).
  - Menyelesaikan masalah *Blocked Mixed Content* yang sebelumnya menyebabkan tampilan website berantakan saat dibuka via link tunnel.
