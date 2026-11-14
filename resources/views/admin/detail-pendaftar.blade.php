@php
    $isStaff = request()->is('staff*');
    $routePrefix = $isStaff ? 'staff.pendaftar.' : 'admin.pendaftar.';
    $portalLabel = $isStaff ? 'Staff KMID' : 'Admin KMID';
    $roleName = $isStaff ? 'Staff Managerial' : 'Administrator';
@endphp

@extends('layouts.admin')

@section('title', $portalLabel . ' - Detail Pendaftar')
@section('topbar_breadcrumb', $portalLabel . ' / Detail Pendaftar')
@section('profile_role', $roleName)

@section('footer_left', 'KMID UGM · Pengelolaan pendaftaran')
@section('footer_right', 'Data contoh')

@section('content')
<div class="space-y-6">
    <!-- Breadcrumb & Page Heading -->
    <div>
        <nav class="flex items-center gap-1.5 text-xs text-[#8E8E93] mb-1.5">
            <span>{{ $isStaff ? 'Staff' : 'Admin' }}</span>
            <span>/</span>
            <span>Pengelolaan pendaftaran</span>
            <span>/</span>
            <a href="{{ route($routePrefix . 'index') }}" class="hover:underline">Kelola Akun</a>
            <span>/</span>
            <span class="text-[#1F1F1F] font-medium">Detail Pendaftar</span>
        </nav>
        <h1 class="text-2xl sm:text-3xl font-bold text-[#1F1F1F] tracking-tight">Detail Pendaftar</h1>
    </div>

    @if(session('success'))
        <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl flex items-center gap-2.5 text-xs sm:text-sm">
            <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span class="font-semibold">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Back Link Button -->
    <div>
        <a href="{{ route($routePrefix . 'index') }}" class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold text-[#004ADA] hover:underline">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali ke daftar pendaftar
        </a>
    </div>

    <!-- Applicant Header Card -->
    <div class="bg-white rounded-[24px] sm:rounded-[28px] p-6 sm:p-8 shadow-[0_10px_35px_rgba(0,0,0,0.03)] border border-gray-100/90 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-xl sm:text-2xl font-bold text-[#1F1F1F]">{{ $pendaftar->name ?? 'Ahmad Tariq Hifzhillah' }}</h2>
            <p class="text-xs sm:text-sm text-[#707070] mt-1">{{ $pendaftar->nim ?? '25/512345/SV/22345' }} · {{ $pendaftar->major ?? 'Teknologi Rekayasa Perangkat Lunak' }}</p>
        </div>
        <div class="sm:text-right">
            <span class="text-xs text-[#707070] block mb-1">Status saat ini</span>
            <span class="inline-block px-3.5 py-1 rounded-full text-xs font-semibold bg-[#EBF2FE] text-[#004ADA] border border-blue-100">
                {{ $pendaftar->status ?? 'Lolos Wawancara' }}
            </span>
        </div>
    </div>

    <!-- 2-Column Main Layout Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        
        <!-- LEFT COLUMN (Span 8) -->
        <div class="lg:col-span-8 space-y-6">
            
            <!-- Card 1: Data Diri -->
            <div class="bg-white rounded-[24px] sm:rounded-[28px] p-6 sm:p-8 shadow-[0_10px_35px_rgba(0,0,0,0.03)] border border-gray-100/90">
                <h3 class="text-base sm:text-lg font-bold text-[#1F1F1F] mb-6">Data diri</h3>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-5 gap-x-8 text-xs sm:text-sm">
                    <!-- Row 1 -->
                    <div>
                        <p class="text-xs text-[#707070] mb-1">Nama lengkap</p>
                        <p class="font-semibold text-[#1F1F1F]">{{ $pendaftar->name ?? 'Ahmad Tariq Hifzhillah' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-[#707070] mb-1">NIM</p>
                        <p class="font-semibold text-[#1F1F1F]">{{ $pendaftar->nim ?? '25/512345/SV/22345' }}</p>
                    </div>

                    <!-- Row 2 -->
                    <div>
                        <p class="text-xs text-[#707070] mb-1">Program studi</p>
                        <p class="font-semibold text-[#1F1F1F]">{{ $pendaftar->major ?? 'Teknologi Rekayasa Perangkat Lunak' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-[#707070] mb-1">Email UGM</p>
                        <p class="font-semibold text-[#1F1F1F]">{{ $pendaftar->email ?? 'ahmad.tariq.h@mail.ugm.ac.id' }}</p>
                    </div>

                    <!-- Row 3 -->
                    <div>
                        <p class="text-xs text-[#707070] mb-1">No. WhatsApp</p>
                        <p class="font-semibold text-[#1F1F1F]">{{ $pendaftar->phone_number ?? '0812-3456-7890' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-[#707070] mb-1">Divisi pilihan</p>
                        <p class="font-semibold text-[#1F1F1F]">{{ $pendaftar->division ?? 'Teknologi' }}</p>
                    </div>
                </div>
            </div>

            <!-- Card 2: Berkas Pendaftaran & Motivasi -->
            <div class="bg-white rounded-[24px] sm:rounded-[28px] p-6 sm:p-8 shadow-[0_10px_35px_rgba(0,0,0,0.03)] border border-gray-100/90">
                <h3 class="text-base sm:text-lg font-bold text-[#1F1F1F] mb-5">Berkas pendaftaran</h3>

                <!-- File Preview Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                    <!-- Box 1: CV -->
                    <div class="p-4 rounded-2xl border border-gray-200/90 bg-gray-50/50 flex flex-col justify-between">
                        <div class="flex items-start gap-3">
                            <div class="w-9 h-9 rounded-xl bg-blue-50 text-[#004ADA] flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div class="min-w-0 flex-1">
                                <span class="text-xs font-bold text-[#1F1F1F] block">CV Pendaftar</span>
                                <p class="text-xs font-semibold text-[#1F1F1F] truncate mt-0.5">
                                    {{ !empty($pendaftar->cv_url) ? basename($pendaftar->cv_url) : 'Belum diunggah' }}
                                </p>
                                <p class="text-[11px] text-[#707070]">Berkas Dokumen</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 mt-4 pt-3 border-t border-gray-200/60">
                            @if(!empty($pendaftar->cv_url))
                                <a href="{{ asset($pendaftar->cv_url) }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1 bg-white border border-gray-200 rounded-lg text-xs font-medium text-[#004ADA] hover:bg-blue-50/50 transition-colors">
                                    <span>Lihat Berkas</span>
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                </a>
                            @else
                                <span class="text-xs text-gray-400">Tidak ada berkas CV</span>
                            @endif
                        </div>
                    </div>

                    <!-- Box 2: Portofolio -->
                    <div class="p-4 rounded-2xl border border-gray-200/90 bg-gray-50/50 flex flex-col justify-between">
                        <div class="flex items-start gap-3">
                            <div class="w-9 h-9 rounded-xl bg-amber-50 text-[#FEA515] flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div class="min-w-0 flex-1">
                                <span class="text-xs font-bold text-[#1F1F1F] block">Portofolio</span>
                                <p class="text-xs font-semibold text-[#1F1F1F] truncate mt-0.5">
                                    {{ !empty($pendaftar->portfolio_url) ? basename($pendaftar->portfolio_url) : 'Belum diunggah' }}
                                </p>
                                <p class="text-[11px] text-[#707070]">Berkas Karya / Pendukung</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 mt-4 pt-3 border-t border-gray-200/60">
                            @if(!empty($pendaftar->portfolio_url))
                                <a href="{{ asset($pendaftar->portfolio_url) }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1 bg-white border border-gray-200 rounded-lg text-xs font-medium text-[#FEA515] hover:bg-amber-50/50 transition-colors">
                                    <span>Lihat Berkas</span>
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                </a>
                            @else
                                <span class="text-xs text-gray-400">Tidak ada berkas portofolio</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Motivasi Singkat -->
                <div>
                    <h4 class="text-xs font-semibold text-[#707070] mb-2">Motivasi &amp; Alasan Memilih Divisi</h4>
                    <div class="p-4 bg-gray-50/70 border border-gray-200/60 rounded-xl text-xs sm:text-sm text-[#1F1F1F] leading-relaxed">
                        <p>{{ $pendaftar->motivation ?? 'Tidak ada catatan motivasi yang dicantumkan.' }}</p>
                    </div>
                </div>
            </div>

            <!-- Card 3: Riwayat Perubahan Status -->
            <div class="bg-white rounded-[24px] sm:rounded-[28px] p-6 sm:p-8 shadow-[0_10px_35px_rgba(0,0,0,0.03)] border border-gray-100/90">
                <div class="flex items-center gap-2 mb-6">
                    <svg class="w-5 h-5 text-[#004ADA]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                    <h3 class="text-base sm:text-lg font-bold text-[#1F1F1F]">Riwayat perubahan status</h3>
                </div>

                <!-- Timeline List -->
                <div class="relative pl-6 space-y-6 before:content-[''] before:absolute before:left-3.5 before:top-3 before:bottom-3 before:w-0.5 before:bg-gray-200">
                    <!-- Step 3: Lolos Wawancara (Latest) -->
                    <div class="relative flex items-start gap-4">
                        <div class="absolute -left-6 w-7 h-7 rounded-full bg-[#EBF2FE] border-2 border-white text-[#004ADA] flex items-center justify-center font-bold text-xs shrink-0 shadow-xs">
                            3
                        </div>
                        <div>
                            <p class="font-bold text-xs sm:text-sm text-[#1F1F1F]">Lolos Wawancara</p>
                            <p class="text-xs text-[#707070] mt-0.5">13 Nov 2026 · 09.20 WIB</p>
                            <p class="text-xs text-[#707070] mt-0.5">Hasil wawancara ditetapkan oleh Tariq Hifzhillah.</p>
                        </div>
                    </div>

                    <!-- Step 2: Lolos Berkas -->
                    <div class="relative flex items-start gap-4">
                        <div class="absolute -left-6 w-7 h-7 rounded-full bg-gray-100 border-2 border-white text-[#707070] flex items-center justify-center font-bold text-xs shrink-0">
                            2
                        </div>
                        <div>
                            <p class="font-bold text-xs sm:text-sm text-[#1F1F1F]">Lolos Berkas</p>
                            <p class="text-xs text-[#707070] mt-0.5">9 Nov 2026 · 10.00 WIB</p>
                            <p class="text-xs text-[#707070] mt-0.5">Berkas diverifikasi oleh Tariq Hifzhillah.</p>
                        </div>
                    </div>

                    <!-- Step 1: Mendaftar -->
                    <div class="relative flex items-start gap-4">
                        <div class="absolute -left-6 w-7 h-7 rounded-full bg-gray-100 border-2 border-white text-[#707070] flex items-center justify-center font-bold text-xs shrink-0">
                            1
                        </div>
                        <div>
                            <p class="font-bold text-xs sm:text-sm text-[#1F1F1F]">Mendaftar</p>
                            <p class="text-xs text-[#707070] mt-0.5">2 Nov 2026 · 08.40 WIB</p>
                            <p class="text-xs text-[#707070] mt-0.5">Pendaftaran dikirim oleh Ahmad Tariq Hifzhillah.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- RIGHT COLUMN (Span 4) -->
        <div class="lg:col-span-4 space-y-6">
            
            <!-- Card 4: Wawancara Details -->
            <div class="bg-white rounded-[24px] sm:rounded-[28px] p-6 shadow-[0_10px_35px_rgba(0,0,0,0.03)] border border-gray-100/90">
                <div class="flex items-center gap-2 mb-5">
                    <svg class="w-5 h-5 text-[#004ADA]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <h3 class="text-base font-bold text-[#1F1F1F]">Wawancara</h3>
                </div>

                <div class="space-y-4 text-xs sm:text-sm">
                    <div>
                        <p class="text-xs text-[#707070] mb-0.5">Hari / Tanggal wawancara</p>
                        <p class="font-semibold text-[#1F1F1F]">{{ $pendaftar->interview_date ?? '8 - 10 Oktober 2026' }}</p>
                    </div>

                    <div>
                        <p class="text-xs text-[#707070] mb-0.5">Sesi / Jam wawancara</p>
                        <p class="font-semibold text-[#1F1F1F]">
                            @if(!empty($pendaftar->interview_time))
                                <span class="text-[#004ADA]">{{ $pendaftar->interview_time }} WIB</span>
                            @else
                                <span class="text-[#9CA3AF] italic">Belum dipilih oleh pendaftar</span>
                            @endif
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-[#707070] mb-0.5">Divisi pendaftar</p>
                        <p class="font-semibold text-[#1F1F1F] leading-tight">{{ $pendaftar->division ?? 'Media Creative' }}</p>
                    </div>

                    <div>
                        <p class="text-xs text-[#707070] mb-0.5">Mode &amp; Lokasi</p>
                        <p class="font-semibold text-[#1F1F1F] leading-snug">Offline · Ruang Diskusi KMID, SV UGM</p>
                    </div>
                </div>
            </div>

            <!-- Card 6: Keputusan Seleksi / Verifikasi Berkas -->
            <div class="bg-white rounded-[24px] sm:rounded-[28px] p-6 shadow-[0_10px_35px_rgba(0,0,0,0.03)] border border-gray-100/90">
                <h3 class="text-base font-bold text-[#1F1F1F] mb-2">Keputusan Seleksi</h3>
                
                @if($pendaftar->status === 'Mendaftar')
                    <p class="font-semibold text-xs text-amber-700">Tahap 1: Verifikasi Berkas Pendaftaran</p>
                    <p class="text-xs text-[#707070] mt-1 leading-relaxed">
                        Pendaftar baru mengirimkan berkas. Jika disetujui (ACC), status akan diubah menjadi <strong>Lolos Berkas</strong> dan pendaftar dapat langsung memilih jadwal wawancara di dashboard oprec mereka.
                    </p>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row items-center gap-2.5 mt-5">
                        <button type="button" onclick="openLoloskanModal()" class="w-full sm:flex-1 py-2.5 px-4 bg-[#004ADA] hover:bg-[#003bb0] text-white rounded-xl text-xs font-semibold shadow-xs transition-colors text-center cursor-pointer">
                            Setujui (Lolos Berkas)
                        </button>
                        <button type="button" onclick="openTolakModal()" class="w-full sm:w-24 py-2.5 px-4 border border-red-300 text-red-600 hover:bg-red-50 rounded-xl text-xs font-semibold transition-colors text-center cursor-pointer">
                            Tolak
                        </button>
                    </div>
                @elseif($pendaftar->status === 'Lolos Berkas')
                    <p class="font-semibold text-xs text-emerald-700">Tahap 2: Lolos Berkas (ACC Admin)</p>
                    <p class="text-xs text-[#707070] mt-1 leading-relaxed">
                        Berkas telah disetujui. Pendaftar saat ini dapat memilih jadwal sesi wawancara.
                        @if(!empty($pendaftar->interview_time))
                            <br><span class="font-bold text-[#1F1F1F]">Jadwal Terpilih:</span> {{ $pendaftar->interview_time }} WIB ({{ $pendaftar->interview_date ?? '8 - 10 Oktober 2026' }})
                        @else
                            <br><span class="text-amber-600">Menunggu pendaftar mengonfirmasi sesi wawancara.</span>
                        @endif
                    </p>

                    <div class="flex flex-col sm:flex-row items-center gap-2.5 mt-5">
                        <button type="button" onclick="openLolosWawancaraModal()" class="w-full sm:flex-1 py-2.5 px-4 bg-[#004ADA] hover:bg-[#003bb0] text-white rounded-xl text-xs font-semibold shadow-xs transition-colors text-center cursor-pointer">
                            Loloskan Wawancara
                        </button>
                        <button type="button" onclick="openTolakModal()" class="w-full sm:w-24 py-2.5 px-4 border border-red-300 text-red-600 hover:bg-red-50 rounded-xl text-xs font-semibold transition-colors text-center cursor-pointer">
                            Tolak
                        </button>
                    </div>
                @elseif($pendaftar->status === 'Lolos Wawancara')
                    <p class="font-semibold text-xs text-blue-700">Tahap 3: Keputusan Akhir Penerimaan</p>
                    <p class="text-xs text-[#707070] mt-1 leading-relaxed">
                        Pendaftar telah menyelesaikan wawancara dan dinyatakan lolos. Silakan tentukan keputusan akhir untuk menerima pendaftar sebagai staf/anggota KMID.
                    </p>

                    <div class="flex flex-col sm:flex-row items-center gap-2.5 mt-5">
                        <button type="button" onclick="openTerimaModal()" class="w-full sm:flex-1 py-2.5 px-4 bg-[#12B76A] hover:bg-[#0f9f5c] text-white rounded-xl text-xs font-semibold shadow-xs transition-colors text-center cursor-pointer">
                            Terima sebagai Anggota
                        </button>
                        <button type="button" onclick="openTolakModal()" class="w-full sm:w-24 py-2.5 px-4 border border-red-300 text-red-600 hover:bg-red-50 rounded-xl text-xs font-semibold transition-colors text-center cursor-pointer">
                            Tolak
                        </button>
                    </div>
                @elseif($pendaftar->status === 'Diterima')
                    <p class="font-semibold text-xs text-[#12B76A]">Resmi Diterima</p>
                    <p class="text-xs text-[#707070] mt-1 leading-relaxed">Pendaftar telah resmi diterima sebagai anggota KMID UGM.</p>
                @else
                    <p class="font-semibold text-xs text-[#D92D20]">Status: Tidak Lolos</p>
                    <p class="text-xs text-[#707070] mt-1 leading-relaxed">Pendaftar tidak lolos pada tahapan seleksi.</p>
                    <div class="mt-4">
                        <button type="button" onclick="openLoloskanModal()" class="w-full py-2 px-3 border border-gray-200 text-[#505050] hover:text-[#004ADA] rounded-xl text-xs font-medium transition-colors text-center cursor-pointer">
                            Pulihkan ke Lolos Berkas
                        </button>
                    </div>
                @endif
                <p class="text-[11px] text-[#8E8E93] mt-2.5">Perubahan status langsung terupdate ke Dashboard pendaftar.</p>
            </div>

        </div>

    </div>
</div>

<!-- ============================================================== -->
<!-- FORM HIDDEN UNTUK PERUBAHAN STATUS                             -->
<!-- ============================================================== -->
<form id="form-action-status" method="POST" action="{{ route($routePrefix . 'status', $pendaftar->id) }}" class="hidden">
    @csrf
    <input type="hidden" name="status" id="input-action-status" value="">
</form>

<!-- ============================================================== -->
<!-- MODAL: SETUJUI / LOLOSKAN BERKAS                              -->
<!-- ============================================================== -->
<div id="modal-loloskan" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/40 hidden">
    <div class="bg-white rounded-[24px] max-w-md w-full p-6 shadow-2xl border border-gray-100">
        <h3 class="text-lg font-bold text-[#1F1F1F] mb-2">Setujui Berkas Pendaftar?</h3>
        <p class="text-xs text-[#707070] leading-relaxed mb-6">
            {{ $pendaftar->name }} akan disetujui (ACC) dan statusnya diubah menjadi <strong>Lolos Berkas</strong>. Bagian jadwal wawancara pada dashboard oprec pendaftar akan otomatis terbuka dan langsung aktif.
        </p>
        <div class="flex items-center justify-end gap-3 pt-3 border-t border-gray-100">
            <button type="button" onclick="closeLoloskanModal()" class="px-4 py-2 border border-gray-200 rounded-xl text-xs font-medium text-[#707070] hover:text-[#1F1F1F] hover:bg-gray-50 transition-colors">
                Batal
            </button>
            <button type="button" onclick="submitStatus('Lolos Berkas')" class="px-5 py-2 bg-[#004ADA] hover:bg-[#003bb0] text-white rounded-xl text-xs font-semibold shadow-xs transition-colors">
                Ya, Setujui Berkas
            </button>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- MODAL: LOLOSKAN WAWANCARA                                      -->
<!-- ============================================================== -->
<div id="modal-lolos-wawancara" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/40 hidden">
    <div class="bg-white rounded-[24px] max-w-md w-full p-6 shadow-2xl border border-gray-100">
        <h3 class="text-lg font-bold text-[#1F1F1F] mb-2">Loloskan Wawancara?</h3>
        <p class="text-xs text-[#707070] leading-relaxed mb-6">
            {{ $pendaftar->name }} akan dipindahkan ke status <strong>Lolos Wawancara</strong>.
        </p>
        <div class="flex items-center justify-end gap-3 pt-3 border-t border-gray-100">
            <button type="button" onclick="closeLolosWawancaraModal()" class="px-4 py-2 border border-gray-200 rounded-xl text-xs font-medium text-[#707070] hover:text-[#1F1F1F] hover:bg-gray-50 transition-colors">
                Batal
            </button>
            <button type="button" onclick="submitStatus('Lolos Wawancara')" class="px-5 py-2 bg-[#004ADA] hover:bg-[#003bb0] text-white rounded-xl text-xs font-semibold shadow-xs transition-colors">
                Loloskan Wawancara
            </button>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- MODAL: TERIMA PENDAFTAR                                        -->
<!-- ============================================================== -->
<div id="modal-terima" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/40 hidden">
    <div class="bg-white rounded-[24px] max-w-md w-full p-6 shadow-2xl border border-gray-100">
        <h3 class="text-lg font-bold text-[#1F1F1F] mb-2">Terima pendaftar?</h3>
        <p class="text-xs text-[#707070] leading-relaxed mb-6">
            {{ $pendaftar->name }} akan resmi diterima sebagai anggota/staf KMID UGM.
        </p>
        <div class="flex items-center justify-end gap-3 pt-3 border-t border-gray-100">
            <button type="button" onclick="closeTerimaModal()" class="px-4 py-2 border border-gray-200 rounded-xl text-xs font-medium text-[#707070] hover:text-[#1F1F1F] hover:bg-gray-50 transition-colors">
                Batal
            </button>
            <button type="button" onclick="submitStatus('Diterima')" class="px-5 py-2 bg-[#12B76A] hover:bg-[#0f9f5c] text-white rounded-xl text-xs font-semibold shadow-xs transition-colors">
                Terima
            </button>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- MODAL: TOLAK PENDAFTAR                                         -->
<!-- ============================================================== -->
<div id="modal-tolak" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/40 hidden">
    <div class="bg-white rounded-[24px] max-w-md w-full p-6 shadow-2xl border border-gray-100">
        <h3 class="text-lg font-bold text-[#1F1F1F] mb-2">Tolak pendaftar?</h3>
        <p class="text-xs text-[#707070] leading-relaxed mb-6">
            {{ $pendaftar->name }} akan dipindahkan ke status <strong>Tidak Lolos</strong>.
        </p>
        <div class="flex items-center justify-end gap-3 pt-3 border-t border-gray-100">
            <button type="button" onclick="closeTolakModal()" class="px-4 py-2 border border-gray-200 rounded-xl text-xs font-medium text-[#707070] hover:text-[#1F1F1F] hover:bg-gray-50 transition-colors">
                Batal
            </button>
            <button type="button" onclick="submitStatus('Tidak Lolos')" class="px-5 py-2 bg-[#D92D20] hover:bg-red-700 text-white rounded-xl text-xs font-semibold shadow-xs transition-colors">
                Tolak
            </button>
        </div>
    </div>
</div>

<script>
    function submitStatus(status) {
        document.getElementById('input-action-status').value = status;
        document.getElementById('form-action-status').submit();
    }

    function openLoloskanModal() {
        document.getElementById('modal-loloskan').classList.remove('hidden');
    }
    function closeLoloskanModal() {
        document.getElementById('modal-loloskan').classList.add('hidden');
    }

    function openLolosWawancaraModal() {
        document.getElementById('modal-lolos-wawancara').classList.remove('hidden');
    }
    function closeLolosWawancaraModal() {
        document.getElementById('modal-lolos-wawancara').classList.add('hidden');
    }

    function openTerimaModal() {
        document.getElementById('modal-terima').classList.remove('hidden');
    }
    function closeTerimaModal() {
        document.getElementById('modal-terima').classList.add('hidden');
    }

    function openTolakModal() {
        document.getElementById('modal-tolak').classList.remove('hidden');
    }
    function closeTolakModal() {
        document.getElementById('modal-tolak').classList.add('hidden');
    }
</script>
@endsection
