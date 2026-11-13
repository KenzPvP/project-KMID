@php
    $isStaff = request()->is('staff*');
    $routePrefix = $isStaff ? 'staff.pendaftar.' : 'admin.pendaftar.';
    $portalLabel = $isStaff ? 'Staff KMID' : 'Admin KMID';
    $roleName = $isStaff ? 'Staff Managerial' : 'Administrator';
@endphp

@extends('layouts.admin')

@section('title', $portalLabel . ' - Pengaturan Pendaftaran')
@section('topbar_breadcrumb', $portalLabel . ' / Pengaturan Pendaftaran')
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
            <span class="text-[#1F1F1F] font-medium">Pengaturan Pendaftaran</span>
        </nav>
        <h1 class="text-2xl sm:text-3xl font-bold text-[#1F1F1F] tracking-tight">Pengaturan Pendaftaran</h1>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-[24px] sm:rounded-[28px] p-6 sm:p-8 lg:p-10 shadow-[0_10px_35px_rgba(0,0,0,0.03)] border border-gray-100/90">
        <!-- Card Header Info -->
        <div class="pb-6 border-b border-gray-100 mb-6">
            <h2 class="text-lg sm:text-xl font-bold text-[#1F1F1F]">Pengaturan pendaftaran</h2>
            <p class="text-xs text-[#707070] mt-0.5">Atur akses pendaftaran, periode, dan persyaratan dalam satu form.</p>
        </div>

        <form action="{{ route($routePrefix . 'pengaturan') }}" method="GET" class="space-y-6">
            <!-- Section 1: Buka Pendaftaran -->
            <div class="flex items-start justify-between gap-4 pb-6 border-b border-gray-100">
                <div>
                    <h3 class="text-xs sm:text-sm font-bold text-[#1F1F1F]">Buka pendaftaran</h3>
                    <p class="text-xs text-[#707070] mt-1">Pendaftar dapat mengisi formulir selama periode pendaftaran aktif.</p>
                </div>
                <div class="flex items-center gap-3">
                    <span id="badge-status-pendaftaran" class="px-3 py-1 rounded-full text-xs font-semibold bg-[#EAF8F0] text-[#1E8E3E] border border-emerald-200">
                        Dibuka
                    </span>
                    <!-- Interactive Toggle Button -->
                    <button type="button" id="toggle-pendaftaran-btn" class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent bg-[#1E8E3E] transition-colors duration-200 ease-in-out focus:outline-none" role="switch" aria-checked="true">
                        <span id="toggle-knob" class="translate-x-5 pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow-md ring-0 transition duration-200 ease-in-out"></span>
                    </button>
                </div>
            </div>

            <!-- Section 2: Periode Pendaftaran -->
            <div class="space-y-2 pb-6 border-b border-gray-100">
                <h3 class="text-xs sm:text-sm font-bold text-[#1F1F1F]">Periode pendaftaran</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 pt-1">
                    <div>
                        <label class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">Tanggal mulai</label>
                        <input type="text" value="01/11/2026" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA]">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">Tanggal selesai</label>
                        <input type="text" value="12/11/2026" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA]">
                    </div>
                </div>
                <p class="text-[11px] text-[#8E8E93] pt-1">Tanggal selesai harus sama dengan atau setelah tanggal mulai.</p>
            </div>

            <!-- Section 3: Teks Persyaratan -->
            <div class="space-y-2">
                <h3 class="text-xs sm:text-sm font-bold text-[#1F1F1F]">Teks persyaratan</h3>
                <p class="text-xs text-[#707070]">Persyaratan ini ditampilkan kepada calon pendaftar.</p>
                <textarea rows="6" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA] leading-relaxed">1. Mahasiswa aktif Universitas Gadjah Mada.
2. Menggunakan email UGM yang aktif.
3. Mengisi data pendaftaran dengan lengkap.
4. Melampirkan CV dan motivasi singkat.
5. Bersedia mengikuti tahapan seleksi KMID.</textarea>
                <p class="text-[11px] text-[#8E8E93]">Perubahan berlaku setelah disimpan.</p>
            </div>

            <!-- Bottom Button -->
            <div class="pt-6 border-t border-gray-100 flex items-center justify-end">
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#004ADA] hover:bg-[#003bb0] text-xs sm:text-sm font-medium text-white shadow-[0_4px_14px_rgba(0,74,218,0.25)] transition-all">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const toggleBtn = document.getElementById('toggle-pendaftaran-btn');
        const knob = document.getElementById('toggle-knob');
        const badge = document.getElementById('badge-status-pendaftaran');
        let isOpen = true;

        toggleBtn.addEventListener('click', () => {
            isOpen = !isOpen;
            if (isOpen) {
                toggleBtn.classList.remove('bg-gray-300');
                toggleBtn.classList.add('bg-[#1E8E3E]');
                knob.classList.remove('translate-x-0');
                knob.classList.add('translate-x-5');
                badge.textContent = 'Dibuka';
                badge.className = 'px-3 py-1 rounded-full text-xs font-semibold bg-[#EAF8F0] text-[#1E8E3E] border border-emerald-200';
            } else {
                toggleBtn.classList.remove('bg-[#1E8E3E]');
                toggleBtn.classList.add('bg-gray-300');
                knob.classList.remove('translate-x-5');
                knob.classList.add('translate-x-0');
                badge.textContent = 'Ditutup';
                badge.className = 'px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-600 border border-gray-200';
            }
        });
    });
</script>
@endsection
