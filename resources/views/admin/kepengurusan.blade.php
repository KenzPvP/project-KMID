@extends('layouts.admin')

@section('title', 'Admin KMID - Kepengurusan')
@section('topbar_breadcrumb', 'Admin KMID / Kepengurusan')

@section('content')
<div class="space-y-6">
    <!-- Breadcrumb & Page Heading Row -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <!-- Breadcrumbs -->
            <nav class="flex items-center gap-1.5 text-xs text-[#8E8E93] mb-1.5">
                <span>Admin</span>
                <span>/</span>
                <span>Pengelolaan konten</span>
                <span>/</span>
                <span class="text-[#1F1F1F] font-medium">Kepengurusan</span>
            </nav>
            <h1 class="text-2xl sm:text-3xl font-bold text-[#1F1F1F] tracking-tight">Kepengurusan</h1>
            <p class="text-xs sm:text-sm text-[#707070] mt-1">Kelola foto, identitas, jabatan, dan urutan tampil struktur kepengurusan KMID.</p>
        </div>

        <!-- Header CTA Button -->
        <div>
            <button type="button" class="inline-flex items-center justify-center bg-[#004ADA] hover:bg-[#003bb0] text-white font-medium text-xs sm:text-sm px-5 py-2.5 rounded-xl shadow-[0_4px_14px_rgba(0,74,218,0.25)] transition-all duration-200">
                Tambah Pengurus
            </button>
        </div>
    </div>

    <!-- Main Table Card -->
    <div class="bg-white rounded-[24px] sm:rounded-[28px] p-6 sm:p-8 lg:p-10 shadow-[0_10px_35px_rgba(0,0,0,0.03)] border border-gray-100/90">
        <!-- Card Header Info -->
        <div class="mb-6">
            <h2 class="text-lg sm:text-xl font-bold text-[#1F1F1F]">Daftar kepengurusan</h2>
            <p class="text-xs text-[#707070] mt-0.5">4 data pengurus · 3 dipublikasikan · 1 draf</p>
        </div>

        <!-- Filter & Search Controls -->
        <div class="flex flex-col md:flex-row items-stretch md:items-center gap-3 sm:gap-4 mb-6">
            <!-- Search Input -->
            <div class="relative flex-1 max-w-lg">
                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </span>
                <input type="text" 
                       placeholder="Cari nama atau jabatan pengurus..." 
                       class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] placeholder:text-[#9CA3AF] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA] transition-colors">
            </div>

            <!-- Kelompok Dropdown -->
            <div class="relative min-w-[150px]">
                <select class="w-full appearance-none bg-white border border-gray-200 rounded-xl px-4 py-2.5 pr-8 text-xs sm:text-sm text-[#707070] focus:outline-none focus:border-[#004ADA] cursor-pointer">
                    <option selected>Semua kelompok</option>
                    <option>Pembina Komunitas</option>
                    <option>Badan Pengurus Harian (BPH)</option>
                    <option>Koordinator Divisi</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
            </div>

            <!-- Periode Filter -->
            <div class="relative min-w-[150px]">
                <select class="w-full appearance-none bg-white border border-gray-200 rounded-xl px-4 py-2.5 pr-8 text-xs sm:text-sm text-[#707070] focus:outline-none focus:border-[#004ADA] cursor-pointer">
                    <option selected>Periode 2025/2026</option>
                    <option>Periode 2024/2025</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Table Responsive Container -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[780px]">
                <thead>
                    <tr class="border-b border-gray-100 text-[11px] font-semibold text-[#8E8E93] uppercase tracking-wider">
                        <th class="pb-3.5 pr-4 w-32">Foto / urutan</th>
                        <th class="pb-3.5 px-4">Nama & kontak</th>
                        <th class="pb-3.5 px-4 w-64">Jabatan & prodi / fakultas</th>
                        <th class="pb-3.5 px-4 w-44">Status & periode</th>
                        <th class="pb-3.5 pl-4 w-28 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100/90 text-xs sm:text-sm">
                    <!-- Row 1 -->
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="py-5 pr-4 align-top">
                            <div class="flex flex-col items-center w-16">
                                <div class="w-14 h-14 rounded-2xl bg-slate-50 border border-gray-200/80 flex items-center justify-center p-2 shadow-2xs">
                                    <img src="{{ asset('images/desainKMID/Hi-fi-design/Frame 1686560879.svg') }}" alt="KMID" class="w-8 h-8 object-contain">
                                </div>
                                <span class="text-[11px] font-medium text-gray-400 mt-1.5">Urutan 01</span>
                            </div>
                        </td>
                        <td class="py-5 px-4 align-top">
                            <div>
                                <h3 class="font-bold text-[#1F1F1F] text-xs sm:text-sm leading-snug">Dr. Ir. Tariq Hifzhillah, M.Eng.</h3>
                                <p class="text-xs text-[#707070] mt-0.5">Departemen Teknik Elektro & Informatika</p>
                                <span class="inline-block mt-1.5 px-2 py-0.5 rounded text-[11px] font-semibold bg-[#EBF2FE] text-[#004ADA]">
                                    Pembina Komunitas
                                </span>
                            </div>
                        </td>
                        <td class="py-5 px-4 align-top">
                            <p class="font-semibold text-[#1F1F1F] text-xs">Dosen Pembina Utama</p>
                            <p class="text-xs text-[#707070] mt-0.5">Sekolah Vokasi · Email belum diisi</p>
                        </td>
                        <td class="py-5 px-4 align-top">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#EAF8F0] text-[#1E8E3E]">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#1E8E3E]"></span>
                                Dipublikasikan
                            </span>
                            <p class="text-[11px] text-[#707070] mt-1">Periode 2025/2026</p>
                        </td>
                        <td class="py-5 pl-4 align-top text-center">
                            <div class="flex flex-col items-center gap-1.5">
                                <button type="button" class="w-16 py-1 text-center border border-gray-200 rounded-lg text-xs font-semibold text-[#004ADA] hover:bg-blue-50 transition-colors">
                                    Edit
                                </button>
                                <button type="button" class="text-xs font-medium text-rose-500 hover:text-rose-700 transition-colors">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="py-5 pr-4 align-top">
                            <div class="flex flex-col items-center w-16">
                                <div class="w-14 h-14 rounded-2xl bg-slate-50 border border-gray-200/80 flex items-center justify-center p-2 shadow-2xs">
                                    <img src="{{ asset('images/desainKMID/Hi-fi-design/Frame 1686560879.svg') }}" alt="KMID" class="w-8 h-8 object-contain">
                                </div>
                                <span class="text-[11px] font-medium text-gray-400 mt-1.5">Urutan 02</span>
                            </div>
                        </td>
                        <td class="py-5 px-4 align-top">
                            <div>
                                <h3 class="font-bold text-[#1F1F1F] text-xs sm:text-sm leading-snug">Tariq Hifzhillah, S.Kom., M.Cs.</h3>
                                <p class="text-xs text-[#707070] mt-0.5">Subdirektorat Kreativitas Mahasiswa</p>
                                <span class="inline-block mt-1.5 px-2 py-0.5 rounded text-[11px] font-semibold bg-[#EBF2FE] text-[#004ADA]">
                                    Pembina Komunitas
                                </span>
                            </div>
                        </td>
                        <td class="py-5 px-4 align-top">
                            <p class="font-semibold text-[#1F1F1F] text-xs">Penasihat Kemahasiswaan</p>
                            <p class="text-xs text-[#707070] mt-0.5">Ditmawa UGM · Email belum diisi</p>
                        </td>
                        <td class="py-5 px-4 align-top">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#EAF8F0] text-[#1E8E3E]">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#1E8E3E]"></span>
                                Dipublikasikan
                            </span>
                            <p class="text-[11px] text-[#707070] mt-1">Periode 2025/2026</p>
                        </td>
                        <td class="py-5 pl-4 align-top text-center">
                            <div class="flex flex-col items-center gap-1.5">
                                <button type="button" class="w-16 py-1 text-center border border-gray-200 rounded-lg text-xs font-semibold text-[#004ADA] hover:bg-blue-50 transition-colors">
                                    Edit
                                </button>
                                <button type="button" class="text-xs font-medium text-rose-500 hover:text-rose-700 transition-colors">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="py-5 pr-4 align-top">
                            <div class="flex flex-col items-center w-16">
                                <div class="w-14 h-14 rounded-2xl bg-slate-50 border border-gray-200/80 flex items-center justify-center p-2 shadow-2xs">
                                    <img src="{{ asset('images/desainKMID/Hi-fi-design/Frame 1686560879.svg') }}" alt="KMID" class="w-8 h-8 object-contain">
                                </div>
                                <span class="text-[11px] font-medium text-gray-400 mt-1.5">Urutan 03</span>
                            </div>
                        </td>
                        <td class="py-5 px-4 align-top">
                            <div>
                                <h3 class="font-bold text-[#1F1F1F] text-xs sm:text-sm leading-snug">Ahmad Tariq Hifzhillah</h3>
                                <p class="text-xs text-[#707070] mt-0.5">ahmad@mail.ugm.ac.id</p>
                                <span class="inline-block mt-1.5 px-2 py-0.5 rounded text-[11px] font-semibold bg-[#EBF2FE] text-[#004ADA]">
                                    Badan Pengurus Harian (BPH)
                                </span>
                            </div>
                        </td>
                        <td class="py-5 px-4 align-top">
                            <p class="font-semibold text-[#1F1F1F] text-xs">Ketua Umum</p>
                            <p class="text-xs text-[#707070] mt-0.5">Teknologi Informasi 2025 · Fakultas Teknik</p>
                        </td>
                        <td class="py-5 px-4 align-top">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#EAF8F0] text-[#1E8E3E]">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#1E8E3E]"></span>
                                Dipublikasikan
                            </span>
                            <p class="text-[11px] text-[#707070] mt-1">Periode 2025/2026</p>
                        </td>
                        <td class="py-5 pl-4 align-top text-center">
                            <div class="flex flex-col items-center gap-1.5">
                                <button type="button" class="w-16 py-1 text-center border border-gray-200 rounded-lg text-xs font-semibold text-[#004ADA] hover:bg-blue-50 transition-colors">
                                    Edit
                                </button>
                                <button type="button" class="text-xs font-medium text-rose-500 hover:text-rose-700 transition-colors">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 4 -->
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="py-5 pr-4 align-top">
                            <div class="flex flex-col items-center w-16">
                                <div class="w-14 h-14 rounded-2xl bg-slate-50 border border-gray-200/80 flex items-center justify-center p-2 shadow-2xs">
                                    <img src="{{ asset('images/desainKMID/Hi-fi-design/Frame 1686560879.svg') }}" alt="KMID" class="w-8 h-8 object-contain">
                                </div>
                                <span class="text-[11px] font-medium text-gray-400 mt-1.5">Urutan 04</span>
                            </div>
                        </td>
                        <td class="py-5 px-4 align-top">
                            <div>
                                <h3 class="font-bold text-[#1F1F1F] text-xs sm:text-sm leading-snug">Ahmad Tariq Hifzhillah</h3>
                                <p class="text-xs text-[#707070] mt-0.5">Contoh data · ahmad@mail.ugm.ac.id</p>
                                <span class="inline-block mt-1.5 px-2 py-0.5 rounded text-[11px] font-semibold bg-[#EBF2FE] text-[#004ADA]">
                                    Koordinator Divisi
                                </span>
                            </div>
                        </td>
                        <td class="py-5 px-4 align-top">
                            <p class="font-semibold text-[#1F1F1F] text-xs">Koordinator Media Creative</p>
                            <p class="text-xs text-[#707070] mt-0.5">Teknologi Rekayasa Perangkat Lunak 2025 · Sekolah Vokasi</p>
                        </td>
                        <td class="py-5 px-4 align-top">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#FEF6EE] text-[#B54708]">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#F79009]"></span>
                                Draf
                            </span>
                            <p class="text-[11px] text-[#707070] mt-1">Periode 2025/2026</p>
                        </td>
                        <td class="py-5 pl-4 align-top text-center">
                            <div class="flex flex-col items-center gap-1.5">
                                <button type="button" class="w-16 py-1 text-center border border-gray-200 rounded-lg text-xs font-semibold text-[#004ADA] hover:bg-blue-50 transition-colors">
                                    Edit
                                </button>
                                <button type="button" class="text-xs font-medium text-rose-500 hover:text-rose-700 transition-colors">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination & Counter Footer -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-3 pt-6 mt-2 border-t border-gray-100 text-xs text-[#707070]">
            <div>Menampilkan 1-4 dari 4 data</div>
            <div class="flex items-center gap-2">
                <span>Halaman</span>
                <span class="w-7 h-7 rounded-lg bg-[#004ADA] text-white flex items-center justify-center font-bold text-xs shadow-xs">
                    1
                </span>
            </div>
        </div>
    </div>
</div>
@endsection
