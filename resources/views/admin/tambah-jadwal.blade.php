@php
    $isStaff = request()->is('staff*');
    $routePrefix = $isStaff ? 'staff.pendaftar.' : 'admin.pendaftar.';
    $portalLabel = $isStaff ? 'Staff KMID' : 'Admin KMID';
    $roleName = $isStaff ? 'Staff Managerial' : 'Administrator';
@endphp

@extends('layouts.admin')

@section('title', $portalLabel . ' - Tambah Jadwal Wawancara')
@section('topbar_breadcrumb', $portalLabel . ' / Tambah Jadwal')
@section('profile_role', $roleName)

@section('footer_left', 'KMID UGM · Pengelolaan pendaftaran')
@section('footer_right', 'Data contoh')

@section('content')
<div class="space-y-6 max-w-5xl">
    <!-- Breadcrumb & Page Heading -->
    <div>
        <nav class="flex items-center gap-1.5 text-xs text-[#8E8E93] mb-1.5">
            <span>{{ $isStaff ? 'Staff' : 'Admin' }}</span>
            <span>/</span>
            <span>Pengelolaan pendaftaran</span>
            <span>/</span>
            <a href="{{ route($routePrefix . 'wawancara') }}" class="hover:underline">Jadwal Wawancara</a>
            <span>/</span>
            <span class="text-[#1F1F1F] font-medium">Tambah Jadwal</span>
        </nav>
        <h1 class="text-2xl sm:text-3xl font-bold text-[#1F1F1F] tracking-tight">Tambah Jadwal</h1>
    </div>

    <!-- Back Button Link -->
    <div>
        <a href="{{ route($routePrefix . 'wawancara') }}" class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold text-[#004ADA] hover:underline">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali ke jadwal wawancara
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-[24px] sm:rounded-[28px] p-6 sm:p-8 lg:p-10 shadow-[0_10px_35px_rgba(0,0,0,0.03)] border border-gray-100/90">
        <!-- Card Header Info -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 pb-6 border-b border-gray-100 mb-6">
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-[#1F1F1F]">Informasi jadwal</h2>
                <p class="text-xs text-[#707070] mt-0.5">Tentukan waktu dan pewawancara, lalu generate slot untuk ditinjau sebelum disimpan.</p>
            </div>
            <span class="text-xs text-[#8E8E93]">Tanda <span class="text-red-500">*</span> wajib diisi</span>
        </div>

        <form action="{{ route($routePrefix . 'wawancara') }}" method="GET" class="space-y-6">
            <!-- 2-Column Fields Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-5 gap-x-8 text-xs sm:text-sm">
                <!-- Col 1: Tanggal -->
                <div>
                    <label class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Tanggal <span class="text-red-500">*</span>
                    </label>
                    <input type="text" value="17/11/2026" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA]">
                    <p class="text-[11px] text-[#8E8E93] mt-1">Pilih tanggal hari ini atau setelahnya.</p>
                </div>

                <!-- Col 2: Nama Pewawancara -->
                <div>
                    <label class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Nama pewawancara <span class="text-red-500">*</span>
                    </label>
                    <input type="text" value="Dwi Putri Lestari" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA]">
                </div>

                <!-- Col 1: Jam Mulai -->
                <div>
                    <label class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Jam mulai <span class="text-red-500">*</span>
                    </label>
                    <input type="text" value="09.00" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA]">
                    <p class="text-[11px] text-[#8E8E93] mt-1">Waktu Indonesia Barat (WIB).</p>
                </div>

                <!-- Col 2: Jam Selesai -->
                <div>
                    <label class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Jam selesai <span class="text-red-500">*</span>
                    </label>
                    <input type="text" value="10.00" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA]">
                    <p class="text-[11px] text-[#8E8E93] mt-1">Harus setelah jam mulai.</p>
                </div>

                <!-- Col 1: Durasi per sesi -->
                <div>
                    <label class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Durasi per sesi <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select class="w-full appearance-none bg-white border border-gray-200 rounded-xl px-4 py-2.5 pr-8 text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] cursor-pointer">
                            <option selected>15 menit</option>
                            <option>20 menit</option>
                            <option>30 menit</option>
                            <option>45 menit</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-[11px] text-[#8E8E93] mt-1">Rentang waktu dibagi sesuai durasi per sesi.</p>
                </div>

                <!-- Col 2: Kuota -->
                <div>
                    <label class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Kuota
                    </label>
                    <input type="number" value="1" min="1" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA]">
                    <p class="text-[11px] text-[#8E8E93] mt-1">Jumlah pendaftar per slot.</p>
                </div>

                <!-- Col 1: Mode -->
                <div>
                    <label class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Mode <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select class="w-full appearance-none bg-white border border-gray-200 rounded-xl px-4 py-2.5 pr-8 text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] cursor-pointer">
                            <option selected>Offline</option>
                            <option>Online</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-[11px] text-[#8E8E93] mt-1">Pilihan: Online atau Offline</p>
                </div>

                <!-- Col 2: Link atau Lokasi -->
                <div>
                    <label class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Link atau lokasi <span class="text-red-500">*</span>
                    </label>
                    <input type="text" value="Ruang Diskusi KMID, Sekolah Vokasi UGM" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA]">
                    <p class="text-[11px] text-[#8E8E93] mt-1">Isi tautan untuk Online atau lokasi untuk Offline.</p>
                </div>
            </div>

            <!-- Generate Button -->
            <div class="pt-2">
                <button type="button" class="px-5 py-2.5 bg-[#004ADA] hover:bg-[#003bb0] text-white rounded-xl text-xs sm:text-sm font-semibold shadow-xs transition-colors">
                    Generate slot otomatis
                </button>
            </div>

            <!-- ============================================================== -->
            <!-- PRATINJAU SLOT SECTION                                         -->
            <!-- ============================================================== -->
            <div class="pt-6 border-t border-gray-100 space-y-4">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                    <div class="flex items-center gap-2.5 flex-wrap">
                        <h3 class="text-sm sm:text-base font-bold text-[#1F1F1F]">Pratinjau slot</h3>
                        <span class="px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#EBF2FE] text-[#004ADA]">
                            4 slot
                        </span>
                        <span class="text-xs text-[#707070]">17 November 2026</span>
                        <span class="text-xs text-[#707070]">·</span>
                        <span class="text-xs text-[#707070]">09.00-10.00 / 15 menit</span>
                    </div>
                </div>
                <p class="text-xs text-[#707070]">Periksa slot yang terbentuk. Hapus slot tertentu dari pratinjau bila tidak diperlukan.</p>

                <!-- Table Preview -->
                <div class="overflow-x-auto border border-gray-200/90 rounded-2xl">
                    <table class="w-full text-left border-collapse min-w-[650px] text-xs">
                        <thead>
                            <tr class="bg-gray-50/80 border-b border-gray-200/80 text-[11px] font-semibold text-[#8E8E93] uppercase tracking-wider">
                                <th class="py-2.5 px-4">Tanggal</th>
                                <th class="py-2.5 px-4">Jam</th>
                                <th class="py-2.5 px-4">Pewawancara</th>
                                <th class="py-2.5 px-4">Mode</th>
                                <th class="py-2.5 px-4 w-20">Kuota</th>
                                <th class="py-2.5 pr-4 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white" id="preview-slot-tbody">
                            <tr id="preview-slot-1" class="hover:bg-slate-50/50">
                                <td class="py-3 px-4 font-medium text-[#1F1F1F]">17 Nov 2026</td>
                                <td class="py-3 px-4 font-semibold text-[#1F1F1F]">09.00-09.15 WIB</td>
                                <td class="py-3 px-4 text-[#707070]">Dwi Putri Lestari</td>
                                <td class="py-3 px-4 font-medium text-[#1F1F1F]">Offline</td>
                                <td class="py-3 px-4 text-[#707070]">1</td>
                                <td class="py-3 pr-4 text-right">
                                    <button type="button" onclick="document.getElementById('preview-slot-1').remove()" class="text-xs font-medium text-rose-500 hover:text-rose-700 transition-colors">
                                        Hapus dari pratinjau
                                    </button>
                                </td>
                            </tr>
                            <tr id="preview-slot-2" class="hover:bg-slate-50/50">
                                <td class="py-3 px-4 font-medium text-[#1F1F1F]">17 Nov 2026</td>
                                <td class="py-3 px-4 font-semibold text-[#1F1F1F]">09.15-09.30 WIB</td>
                                <td class="py-3 px-4 text-[#707070]">Dwi Putri Lestari</td>
                                <td class="py-3 px-4 font-medium text-[#1F1F1F]">Offline</td>
                                <td class="py-3 px-4 text-[#707070]">1</td>
                                <td class="py-3 pr-4 text-right">
                                    <button type="button" onclick="document.getElementById('preview-slot-2').remove()" class="text-xs font-medium text-rose-500 hover:text-rose-700 transition-colors">
                                        Hapus dari pratinjau
                                    </button>
                                </td>
                            </tr>
                            <tr id="preview-slot-3" class="hover:bg-slate-50/50">
                                <td class="py-3 px-4 font-medium text-[#1F1F1F]">17 Nov 2026</td>
                                <td class="py-3 px-4 font-semibold text-[#1F1F1F]">09.30-09.45 WIB</td>
                                <td class="py-3 px-4 text-[#707070]">Dwi Putri Lestari</td>
                                <td class="py-3 px-4 font-medium text-[#1F1F1F]">Offline</td>
                                <td class="py-3 px-4 text-[#707070]">1</td>
                                <td class="py-3 pr-4 text-right">
                                    <button type="button" onclick="document.getElementById('preview-slot-3').remove()" class="text-xs font-medium text-rose-500 hover:text-rose-700 transition-colors">
                                        Hapus dari pratinjau
                                    </button>
                                </td>
                            </tr>
                            <tr id="preview-slot-4" class="hover:bg-slate-50/50">
                                <td class="py-3 px-4 font-medium text-[#1F1F1F]">17 Nov 2026</td>
                                <td class="py-3 px-4 font-semibold text-[#1F1F1F]">09.45-10.00 WIB</td>
                                <td class="py-3 px-4 text-[#707070]">Dwi Putri Lestari</td>
                                <td class="py-3 px-4 font-medium text-[#1F1F1F]">Offline</td>
                                <td class="py-3 px-4 text-[#707070]">1</td>
                                <td class="py-3 pr-4 text-right">
                                    <button type="button" onclick="document.getElementById('preview-slot-4').remove()" class="text-xs font-medium text-rose-500 hover:text-rose-700 transition-colors">
                                        Hapus dari pratinjau
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Footer Summary of preview -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between text-xs text-[#707070] gap-2 pt-2">
                    <p class="text-[11px] text-[#8E8E93]">Slot baru berstatus Tersedia setelah disimpan. Belum ada perubahan pada jadwal saat ini.</p>
                    <p class="font-medium text-[#1F1F1F]">4 slot akan disimpan · Kuota 1 per slot</p>
                </div>
            </div>

            <!-- Bottom Action Buttons -->
            <div class="pt-6 border-t border-gray-100 flex items-center justify-end gap-3">
                <a href="{{ route($routePrefix . 'wawancara') }}" class="px-5 py-2.5 rounded-xl border border-gray-200 text-xs sm:text-sm font-medium text-[#707070] hover:text-[#1F1F1F] hover:bg-gray-50 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#004ADA] hover:bg-[#003bb0] text-xs sm:text-sm font-medium text-white shadow-[0_4px_14px_rgba(0,74,218,0.25)] transition-all">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
