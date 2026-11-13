@php
    $isStaff = request()->is('staff*');
    $routePrefix = $isStaff ? 'staff.pendaftar.' : 'admin.pendaftar.';
    $portalLabel = $isStaff ? 'Staff KMID' : 'Admin KMID';
    $roleName = $isStaff ? 'Staff Managerial' : 'Administrator';
@endphp

@extends('layouts.admin')

@section('title', $portalLabel . ' - Tambah Pendaftar')
@section('topbar_breadcrumb', $portalLabel . ' / Tambah Pendaftar')
@section('profile_role', $roleName)

@section('footer_left', 'KMID UGM · Pengelolaan pendaftaran')
@section('footer_right', 'Data contoh')

@section('content')
<div class="space-y-6 max-w-4xl">
    <!-- Breadcrumb & Page Heading -->
    <div>
        <nav class="flex items-center gap-1.5 text-xs text-[#8E8E93] mb-1.5">
            <span>{{ $isStaff ? 'Staff' : 'Admin' }}</span>
            <span>/</span>
            <span>Pengelolaan pendaftaran</span>
            <span>/</span>
            <a href="{{ route($routePrefix . 'index') }}" class="hover:underline">Kelola Akun</a>
            <span>/</span>
            <span class="text-[#1F1F1F] font-medium">Tambah Pendaftar</span>
        </nav>
        <h1 class="text-2xl sm:text-3xl font-bold text-[#1F1F1F] tracking-tight">Tambah Pendaftar</h1>
    </div>

    <!-- Back Button Link -->
    <div>
        <a href="{{ route($routePrefix . 'index') }}" class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold text-[#004ADA] hover:underline">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali ke daftar pendaftar
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-[24px] sm:rounded-[28px] p-6 sm:p-8 lg:p-10 shadow-[0_10px_35px_rgba(0,0,0,0.03)] border border-gray-100/90">
        <!-- Card Header Info -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 pb-6 border-b border-gray-100 mb-6">
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-[#1F1F1F]">Data pendaftar</h2>
                <p class="text-xs text-[#707070] mt-0.5">Lengkapi data pendaftar. Pastikan NIM dan email UGM sudah sesuai.</p>
            </div>
            <span class="text-xs text-[#8E8E93]">Tanda <span class="text-red-500">*</span> wajib diisi</span>
        </div>

        <form action="{{ route($routePrefix . 'index') }}" method="GET" class="space-y-6">
            <!-- 2-Column Fields Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-5 gap-x-8 text-xs sm:text-sm">
                <!-- Col 1: Nama Lengkap -->
                <div>
                    <label class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Nama lengkap <span class="text-red-500">*</span>
                    </label>
                    <input type="text" value="Rania Safira" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA]">
                </div>

                <!-- Col 2: NIM -->
                <div>
                    <label class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        NIM <span class="text-red-500">*</span>
                    </label>
                    <input type="text" value="25/512353/SV/22353" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA]">
                    <p class="text-[11px] text-[#8E8E93] mt-1">Format: 25/512345/SV/22345. NIM harus unik.</p>
                </div>

                <!-- Col 1: Program Studi -->
                <div>
                    <label class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Program studi <span class="text-red-500">*</span>
                    </label>
                    <input type="text" value="Teknologi Rekayasa Perangkat Lunak" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA]">
                </div>

                <!-- Col 2: Email UGM -->
                <div>
                    <label class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Email UGM <span class="text-red-500">*</span>
                    </label>
                    <input type="email" value="rania.safira@mail.ugm.ac.id" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA]">
                    <p class="text-[11px] text-[#8E8E93] mt-1">Gunakan email UGM yang aktif.</p>
                </div>

                <!-- Col 1: No. WhatsApp -->
                <div>
                    <label class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        No. WhatsApp
                    </label>
                    <input type="text" value="0813-9876-5432" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA]">
                </div>

                <!-- Col 2: Divisi Pilihan -->
                <div>
                    <label class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Divisi pilihan <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select class="w-full appearance-none bg-white border border-gray-200 rounded-xl px-4 py-2.5 pr-8 text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] cursor-pointer">
                            <option selected>Teknologi</option>
                            <option>Media Kreatif</option>
                            <option>Humas</option>
                            <option>Riset & Inovasi</option>
                            <option>Perlombaan</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Col 1: Link CV/Berkas -->
                <div>
                    <label class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Link CV/berkas
                    </label>
                    <input type="url" value="https://example.com/cv/rania-safira.pdf" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA]">
                </div>

                <!-- Col 2: Status Awal -->
                <div>
                    <label class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Status awal
                    </label>
                    <input type="text" value="Mendaftar" readonly class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-xs sm:text-sm text-[#707070] cursor-not-allowed">
                    <p class="text-[11px] text-[#8E8E93] mt-1">Status default untuk pendaftar baru.</p>
                </div>
            </div>

            <!-- Full-width Textarea: Motivasi Singkat -->
            <div>
                <label class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                    Motivasi singkat
                </label>
                <textarea rows="4" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA] leading-relaxed">Saya ingin mengembangkan produk digital yang bermanfaat untuk mahasiswa. Saya tertarik berkontribusi pada divisi Teknologi dan belajar berkolaborasi dalam pengembangan perangkat lunak bersama tim KMID.</textarea>
            </div>

            <!-- Bottom Row: Helper Note & Buttons -->
            <div class="pt-6 border-t border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <p class="text-[11px] text-[#8E8E93]">Data akan muncul di daftar setelah disimpan.</p>
                <div class="flex items-center gap-3">
                    <a href="{{ route($routePrefix . 'index') }}" class="px-5 py-2.5 rounded-xl border border-gray-200 text-xs sm:text-sm font-medium text-[#707070] hover:text-[#1F1F1F] hover:bg-gray-50 transition-colors">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#004ADA] hover:bg-[#003bb0] text-xs sm:text-sm font-medium text-white shadow-[0_4px_14px_rgba(0,74,218,0.25)] transition-all">
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
