@extends('layouts.admin')

@section('title', 'Admin KMID - Galeri Aktivitas')
@section('topbar_breadcrumb', 'Admin KMID / Galeri Aktivitas')

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
                <span class="text-[#1F1F1F] font-medium">Galeri Aktivitas</span>
            </nav>
            <h1 class="text-2xl sm:text-3xl font-bold text-[#1F1F1F] tracking-tight">Galeri Aktivitas</h1>
            <p class="text-xs sm:text-sm text-[#707070] mt-1">Unggah dokumentasi kegiatan dan kelola caption yang tampil pada galeri publik.</p>
        </div>

        <!-- Header CTA Button -->
        <div>
            <a href="{{ route('admin.galeri-aktivitas.edit') }}" class="inline-flex items-center justify-center bg-[#004ADA] hover:bg-[#003bb0] text-white font-medium text-xs sm:text-sm px-6 py-2.5 rounded-xl shadow-[0_4px_14px_rgba(0,74,218,0.25)] transition-all duration-200">
                Button CTA
            </a>
        </div>
    </div>

    <!-- Main Table Card -->
    <div class="bg-white rounded-[24px] sm:rounded-[28px] p-6 sm:p-8 lg:p-10 shadow-[0_10px_35px_rgba(0,0,0,0.03)] border border-gray-100/90">
        <!-- Card Header Info -->
        <div class="mb-6">
            <h2 class="text-lg sm:text-xl font-bold text-[#1F1F1F]">Dokumentasi aktivitas</h2>
            <p class="text-xs text-[#707070] mt-0.5">5 aktivitas · 4 dipublikasikan · 1 draf</p>
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
                       placeholder="Cari judul aktivitas atau caption..." 
                       class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] placeholder:text-[#9CA3AF] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA] transition-colors">
            </div>

            <!-- Status Dropdown -->
            <div class="relative min-w-[150px]">
                <select class="w-full appearance-none bg-white border border-gray-200 rounded-xl px-4 py-2.5 pr-8 text-xs sm:text-sm text-[#707070] focus:outline-none focus:border-[#004ADA] cursor-pointer">
                    <option selected>Semua status</option>
                    <option>Dipublikasikan</option>
                    <option>Draf</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
            </div>

            <!-- Kategori Dropdown -->
            <div class="relative min-w-[150px]">
                <select class="w-full appearance-none bg-white border border-gray-200 rounded-xl px-4 py-2.5 pr-8 text-xs sm:text-sm text-[#707070] focus:outline-none focus:border-[#004ADA] cursor-pointer">
                    <option selected>Semua kategori</option>
                    <option>LAB INOVASI</option>
                    <option>PODIUM PRESTASI</option>
                    <option>DESIGN SPRINT</option>
                    <option>DEMO DAY</option>
                    <option>COMMUNITY</option>
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
            <table class="w-full text-left border-collapse min-w-[700px]">
                <thead>
                    <tr class="border-b border-gray-100 text-[11px] font-semibold text-[#8E8E93] uppercase tracking-wider">
                        <th class="pb-3.5 pr-4">Foto, judul & caption</th>
                        <th class="pb-3.5 px-4 w-48">Tanggal / lokasi</th>
                        <th class="pb-3.5 px-4 w-36">Publikasi</th>
                        <th class="pb-3.5 pl-4 w-28 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100/90 text-xs sm:text-sm">
                    <!-- Row 1 -->
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="py-4 pr-4">
                            <div class="flex items-start gap-4">
                                <img src="{{ asset('images/desainKMID/Hi-fi-design/activity_img_0.png') }}" alt="" class="w-24 h-16 rounded-xl object-cover shrink-0 border border-gray-100 shadow-xs">
                                <div>
                                    <span class="inline-block text-[#004ADA] text-[11px] font-bold tracking-wide uppercase mb-0.5">LAB INOVASI</span>
                                    <h3 class="font-bold text-[#1F1F1F] text-xs sm:text-sm leading-snug">Hands-on UI/UX Prototyping & Modern Frontend Clinic</h3>
                                    <p class="text-xs text-[#707070] mt-1 leading-relaxed max-w-xl">Sesi mentoring intensif pembedahan desain sistem atomik dan pengenalan API bersama mahasiswa Sekolah Vokasi dan Fasilkom.</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-4 align-top">
                            <p class="font-medium text-[#1F1F1F] text-xs">12 April 2025</p>
                            <p class="text-xs text-[#707070] mt-0.5 leading-tight">Laboratorium Terpadu Gedung Tahir UGM</p>
                        </td>
                        <td class="py-4 px-4 align-top">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#EAF8F0] text-[#1E8E3E]">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#1E8E3E]"></span>
                                Dipublikasikan
                            </span>
                            <p class="text-[11px] text-[#707070] mt-1">Tayang di Activities</p>
                        </td>
                        <td class="py-4 pl-4 align-top text-center">
                            <div class="flex flex-col items-center gap-1.5">
                                <a href="{{ route('admin.galeri-aktivitas.edit') }}" class="w-16 py-1 text-center border border-gray-200 rounded-lg text-xs font-semibold text-[#004ADA] hover:bg-blue-50 transition-colors">
                                    Edit
                                </a>
                                <button type="button" class="text-xs font-medium text-rose-500 hover:text-rose-700 transition-colors">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="py-4 pr-4">
                            <div class="flex items-start gap-4">
                                <img src="{{ asset('images/desainKMID/Hi-fi-design/activity_img_0.png') }}" alt="" class="w-24 h-16 rounded-xl object-cover shrink-0 border border-gray-100 shadow-xs">
                                <div>
                                    <span class="inline-block text-[#004ADA] text-[11px] font-bold tracking-wide uppercase mb-0.5">PODIUM PRESTASI</span>
                                    <h3 class="font-bold text-[#1F1F1F] text-xs sm:text-sm leading-snug">Penganugerahan Juara Umum Delegasi KMID UGM</h3>
                                    <p class="text-xs text-[#707070] mt-1 leading-relaxed max-w-xl">Kenangan membanggakan kontingen inovasi digital UGM membawa pulang medali emas dan penghargaan poster terbaik.</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-4 align-top">
                            <p class="font-medium text-[#1F1F1F] text-xs">20 Juni 2024</p>
                            <p class="text-xs text-[#707070] mt-0.5 leading-tight">Ajang LIDM Nasional</p>
                        </td>
                        <td class="py-4 px-4 align-top">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#EAF8F0] text-[#1E8E3E]">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#1E8E3E]"></span>
                                Dipublikasikan
                            </span>
                            <p class="text-[11px] text-[#707070] mt-1">Tayang di Activities</p>
                        </td>
                        <td class="py-4 pl-4 align-top text-center">
                            <div class="flex flex-col items-center gap-1.5">
                                <a href="{{ route('admin.galeri-aktivitas.edit') }}" class="w-16 py-1 text-center border border-gray-200 rounded-lg text-xs font-semibold text-[#004ADA] hover:bg-blue-50 transition-colors">
                                    Edit
                                </a>
                                <button type="button" class="text-xs font-medium text-rose-500 hover:text-rose-700 transition-colors">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="py-4 pr-4">
                            <div class="flex items-start gap-4">
                                <img src="{{ asset('images/desainKMID/Hi-fi-design/activity_img_1.jpeg') }}" alt="" class="w-24 h-16 rounded-xl object-cover shrink-0 border border-gray-100 shadow-xs">
                                <div>
                                    <span class="inline-block text-[#004ADA] text-[11px] font-bold tracking-wide uppercase mb-0.5">DESIGN SPRINT</span>
                                    <h3 class="font-bold text-[#1F1F1F] text-xs sm:text-sm leading-snug">Affinity Mapping Ide Solusi</h3>
                                    <p class="text-xs text-[#707070] mt-1 leading-relaxed max-w-xl">Sesi 48 jam validasi pain point civitas kampus.</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-4 align-top">
                            <p class="font-medium text-[#1F1F1F] text-xs">19 April 2025</p>
                            <p class="text-xs text-[#707070] mt-0.5 leading-tight">UGM</p>
                        </td>
                        <td class="py-4 px-4 align-top">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#EAF8F0] text-[#1E8E3E]">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#1E8E3E]"></span>
                                Dipublikasikan
                            </span>
                            <p class="text-[11px] text-[#707070] mt-1">Tayang di Activities</p>
                        </td>
                        <td class="py-4 pl-4 align-top text-center">
                            <div class="flex flex-col items-center gap-1.5">
                                <a href="{{ route('admin.galeri-aktivitas.edit') }}" class="w-16 py-1 text-center border border-gray-200 rounded-lg text-xs font-semibold text-[#004ADA] hover:bg-blue-50 transition-colors">
                                    Edit
                                </a>
                                <button type="button" class="text-xs font-medium text-rose-500 hover:text-rose-700 transition-colors">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 4 -->
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="py-4 pr-4">
                            <div class="flex items-start gap-4">
                                <img src="{{ asset('images/desainKMID/Hi-fi-design/activity_img_2.jpeg') }}" alt="" class="w-24 h-16 rounded-xl object-cover shrink-0 border border-gray-100 shadow-xs">
                                <div>
                                    <span class="inline-block text-[#004ADA] text-[11px] font-bold tracking-wide uppercase mb-0.5">DEMO DAY</span>
                                    <h3 class="font-bold text-[#1F1F1F] text-xs sm:text-sm leading-snug">Pitch Deck Live Presentation</h3>
                                    <p class="text-xs text-[#707070] mt-1 leading-relaxed max-w-xl">Demo prototipe aplikasi di depan kurator industri.</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-4 align-top">
                            <p class="font-medium text-[#1F1F1F] text-xs">26 April 2025</p>
                            <p class="text-xs text-[#707070] mt-0.5 leading-tight">UGM</p>
                        </td>
                        <td class="py-4 px-4 align-top">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#EAF8F0] text-[#1E8E3E]">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#1E8E3E]"></span>
                                Dipublikasikan
                            </span>
                            <p class="text-[11px] text-[#707070] mt-1">Tayang di Activities</p>
                        </td>
                        <td class="py-4 pl-4 align-top text-center">
                            <div class="flex flex-col items-center gap-1.5">
                                <a href="{{ route('admin.galeri-aktivitas.edit') }}" class="w-16 py-1 text-center border border-gray-200 rounded-lg text-xs font-semibold text-[#004ADA] hover:bg-blue-50 transition-colors">
                                    Edit
                                </a>
                                <button type="button" class="text-xs font-medium text-rose-500 hover:text-rose-700 transition-colors">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 5 -->
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="py-4 pr-4">
                            <div class="flex items-start gap-4">
                                <img src="{{ asset('images/desainKMID/Hi-fi-design/activity_img_0.png') }}" alt="" class="w-24 h-16 rounded-xl object-cover shrink-0 border border-gray-100 shadow-xs">
                                <div>
                                    <span class="inline-block text-[#FEA515] text-[11px] font-bold tracking-wide uppercase mb-0.5">COMMUNITY</span>
                                    <h3 class="font-bold text-[#1F1F1F] text-xs sm:text-sm leading-snug">Temu Akrab & Welcoming Party</h3>
                                    <p class="text-xs text-[#707070] mt-1 leading-relaxed max-w-xl">Membangun koneksi lintas angkatan di Gelanggang UGM.</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-4 align-top">
                            <p class="font-medium text-[#1F1F1F] text-xs">3 Mei 2025</p>
                            <p class="text-xs text-[#707070] mt-0.5 leading-tight">Gelanggang UGM</p>
                        </td>
                        <td class="py-4 px-4 align-top">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#FEF6EE] text-[#B54708]">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#F79009]"></span>
                                Draf
                            </span>
                            <p class="text-[11px] text-[#707070] mt-1">Belum tayang</p>
                        </td>
                        <td class="py-4 pl-4 align-top text-center">
                            <div class="flex flex-col items-center gap-1.5">
                                <a href="{{ route('admin.galeri-aktivitas.edit') }}" class="w-16 py-1 text-center border border-gray-200 rounded-lg text-xs font-semibold text-[#004ADA] hover:bg-blue-50 transition-colors">
                                    Edit
                                </a>
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
            <div>Menampilkan 1-5 dari 5 data</div>
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
