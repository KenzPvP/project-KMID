@php
    $isStaff = request()->is('staff*');
    $routePrefix = $isStaff ? 'staff.pendaftar.' : 'admin.pendaftar.';
    $portalLabel = $isStaff ? 'Staff KMID' : 'Admin KMID';
    $roleName = $isStaff ? 'Staff Managerial' : 'Administrator';
@endphp

@extends('layouts.admin')

@section('title', $portalLabel . ' - Kelola Akun Pendaftar')
@section('topbar_breadcrumb', $portalLabel . ' / Kelola Akun Pendaftar')
@section('profile_role', $roleName)

@section('footer_left', 'KMID UGM · Pengelolaan pendaftaran')
@section('footer_right', 'Data contoh')

@section('content')
<div class="space-y-6">
    <!-- Breadcrumb & Page Heading Row -->
    <div>
        <nav class="flex items-center gap-1.5 text-xs text-[#8E8E93] mb-1.5">
            <span>{{ $isStaff ? 'Staff' : 'Admin' }}</span>
            <span>/</span>
            <span>Pengelolaan pendaftaran</span>
            <span>/</span>
            <span class="text-[#1F1F1F] font-medium">Kelola Akun</span>
        </nav>
        <h1 class="text-2xl sm:text-3xl font-bold text-[#1F1F1F] tracking-tight">Kelola Akun Pendaftar</h1>
        <!-- Orange Accent Bar under Heading (as in design) -->
        <div class="w-14 h-1 bg-[#FEA515] rounded-full mt-2"></div>
    </div>

    <!-- Summary Metric Cards (5 Cards) -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3 sm:gap-4">
        <!-- Card 1: Mendaftar -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 shadow-[0_4px_20px_rgba(0,0,0,0.02)] border border-gray-100 flex flex-col justify-between relative overflow-hidden">
            <div>
                <p class="text-xs text-[#707070] font-medium">Mendaftar</p>
                <div class="flex items-baseline gap-1.5 mt-2">
                    <span class="text-2xl sm:text-3xl font-bold text-[#1F1F1F]">2</span>
                    <span class="text-xs text-[#707070]">pendaftar</span>
                </div>
            </div>
            <!-- Bottom Line Accent: Dark Gray / Black -->
            <div class="w-full h-1 bg-[#1F1F1F] rounded-full mt-4"></div>
        </div>

        <!-- Card 2: Lolos Berkas -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 shadow-[0_4px_20px_rgba(0,0,0,0.02)] border border-gray-100 flex flex-col justify-between relative overflow-hidden">
            <div>
                <p class="text-xs text-[#707070] font-medium">Lolos Berkas</p>
                <div class="flex items-baseline gap-1.5 mt-2">
                    <span class="text-2xl sm:text-3xl font-bold text-[#1F1F1F]">3</span>
                    <span class="text-xs text-[#707070]">pendaftar</span>
                </div>
            </div>
            <!-- Bottom Line Accent: Amber / Yellow -->
            <div class="w-full h-1 bg-[#FEA515] rounded-full mt-4"></div>
        </div>

        <!-- Card 3: Lolos Wawancara -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 shadow-[0_4px_20px_rgba(0,0,0,0.02)] border border-gray-100 flex flex-col justify-between relative overflow-hidden">
            <div>
                <p class="text-xs text-[#707070] font-medium">Lolos Wawancara</p>
                <div class="flex items-baseline gap-1.5 mt-2">
                    <span class="text-2xl sm:text-3xl font-bold text-[#1F1F1F]">1</span>
                    <span class="text-xs text-[#707070]">pendaftar</span>
                </div>
            </div>
            <!-- Bottom Line Accent: Blue -->
            <div class="w-full h-1 bg-[#004ADA] rounded-full mt-4"></div>
        </div>

        <!-- Card 4: Tidak Lolos -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 shadow-[0_4px_20px_rgba(0,0,0,0.02)] border border-gray-100 flex flex-col justify-between relative overflow-hidden">
            <div>
                <p class="text-xs text-[#707070] font-medium">Tidak Lolos</p>
                <div class="flex items-baseline gap-1.5 mt-2">
                    <span class="text-2xl sm:text-3xl font-bold text-[#1F1F1F]">1</span>
                    <span class="text-xs text-[#707070]">pendaftar</span>
                </div>
            </div>
            <!-- Bottom Line Accent: Red -->
            <div class="w-full h-1 bg-[#D92D20] rounded-full mt-4"></div>
        </div>

        <!-- Card 5: Diterima -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 shadow-[0_4px_20px_rgba(0,0,0,0.02)] border border-gray-100 flex flex-col justify-between relative overflow-hidden col-span-2 sm:col-span-1">
            <div>
                <p class="text-xs text-[#707070] font-medium">Diterima</p>
                <div class="flex items-baseline gap-1.5 mt-2">
                    <span class="text-2xl sm:text-3xl font-bold text-[#1F1F1F]">1</span>
                    <span class="text-xs text-[#707070]">pendaftar</span>
                </div>
            </div>
            <!-- Bottom Line Accent: Green -->
            <div class="w-full h-1 bg-[#12B76A] rounded-full mt-4"></div>
        </div>
    </div>

    <!-- Main Table Card -->
    <div class="bg-white rounded-[24px] sm:rounded-[28px] p-6 sm:p-8 lg:p-10 shadow-[0_10px_35px_rgba(0,0,0,0.03)] border border-gray-100/90">
        <!-- Card Header: Title & Action Button -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-[#1F1F1F]">Daftar pendaftar</h2>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-xs sm:text-sm text-[#707070]">8 pendaftar</span>
                <a href="{{ route($routePrefix . 'create') }}" class="inline-flex items-center justify-center bg-[#004ADA] hover:bg-[#003bb0] text-white font-medium text-xs sm:text-sm px-4 py-2 rounded-xl shadow-[0_4px_14px_rgba(0,74,218,0.25)] transition-all duration-200">
                    + Tambah Pendaftar
                </a>
            </div>
        </div>

        <!-- Search Bar & Export Button Row -->
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3 mb-4">
            <!-- Search Input -->
            <div class="relative flex-1 max-w-md">
                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </span>
                <input type="text" 
                       placeholder="Cari nama atau NIM pendaftar..." 
                       class="w-full pl-10 pr-4 py-2 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] placeholder:text-[#9CA3AF] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA] transition-colors">
            </div>

            <!-- Ekspor Button -->
            <div>
                <button type="button" class="inline-flex items-center gap-1.5 px-3 py-2 bg-white border border-gray-200 rounded-xl text-xs font-medium text-[#707070] hover:text-[#1F1F1F] hover:bg-gray-50 transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                    Ekspor
                </button>
            </div>
        </div>

        <!-- Status Filter Tabs (Pill Buttons) -->
        <div class="flex items-center gap-2 overflow-x-auto pb-2 mb-5">
            <button type="button" class="px-4 py-1.5 rounded-xl text-xs font-semibold bg-[#004ADA] text-white shadow-xs transition-colors shrink-0">
                Semua
            </button>
            <button type="button" class="px-4 py-1.5 rounded-xl text-xs font-medium bg-white border border-gray-200 text-[#707070] hover:text-[#1F1F1F] hover:bg-gray-50 transition-colors shrink-0">
                Lolos Berkas
            </button>
            <button type="button" class="px-4 py-1.5 rounded-xl text-xs font-medium bg-white border border-gray-200 text-[#707070] hover:text-[#1F1F1F] hover:bg-gray-50 transition-colors shrink-0">
                Lolos Wawancara
            </button>
            <button type="button" class="px-4 py-1.5 rounded-xl text-xs font-medium bg-white border border-gray-200 text-[#707070] hover:text-[#1F1F1F] hover:bg-gray-50 transition-colors shrink-0">
                Tidak Lolos
            </button>
            <button type="button" class="px-4 py-1.5 rounded-xl text-xs font-medium bg-white border border-gray-200 text-[#707070] hover:text-[#1F1F1F] hover:bg-gray-50 transition-colors shrink-0">
                Diterima
            </button>
        </div>

        <!-- Table Responsive Container -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[950px]">
                <thead>
                    <tr class="bg-gray-50/70 border-b border-gray-200/80 text-[11px] font-semibold text-[#707070]">
                        <th class="py-3 px-3">
                            <div class="flex items-center gap-1">
                                <span>Nama lengkap</span>
                                <span class="text-gray-400">↑</span>
                            </div>
                        </th>
                        <th class="py-3 px-3">
                            <div class="flex items-center gap-1">
                                <span>NIM</span>
                                <span class="text-gray-400">⇅</span>
                            </div>
                        </th>
                        <th class="py-3 px-3">
                            <div class="flex items-center gap-1">
                                <span>Program studi</span>
                                <span class="text-gray-400">⇅</span>
                            </div>
                        </th>
                        <th class="py-3 px-3">
                            <div class="flex items-center gap-1">
                                <span>Divisi pilihan</span>
                                <span class="text-gray-400">⇅</span>
                            </div>
                        </th>
                        <th class="py-3 px-3">
                            <div class="flex items-center gap-1">
                                <span>Status</span>
                                <span class="text-gray-400">⇅</span>
                            </div>
                        </th>
                        <th class="py-3 px-3">
                            <div class="flex items-center gap-1">
                                <span>Tanggal wawancara</span>
                                <span class="text-gray-400">⇅</span>
                            </div>
                        </th>
                        <th class="py-3 px-3">
                            <div class="flex items-center gap-1">
                                <span>Jam wawancara</span>
                                <span class="text-gray-400">⇅</span>
                            </div>
                        </th>
                        <th class="py-3 px-3 text-center">Aksi</th>
                        <th class="py-3 pr-3 w-6"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-xs">
                    <!-- Row 1: Ahmad Tariq Hifzhillah -->
                    <tr class="hover:bg-slate-50/60 transition-colors">
                        <td class="py-3.5 px-3 font-semibold text-[#1F1F1F]">Ahmad Tariq Hifzhillah</td>
                        <td class="py-3.5 px-3 text-[#707070]">25/512345/SV/22345</td>
                        <td class="py-3.5 px-3 text-[#707070]">Teknologi Rekayasa Perangkat Lunak</td>
                        <td class="py-3.5 px-3 text-[#1F1F1F]">Teknologi</td>
                        <td class="py-3.5 px-3">
                            <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#EBF2FE] text-[#004ADA]">
                                Lolos Wawancara
                            </span>
                        </td>
                        <td class="py-3.5 px-3 text-[#1F1F1F]">13 Nov 2026</td>
                        <td class="py-3.5 px-3 text-[#707070]">09.00-09.15 WIB</td>
                        <td class="py-3.5 px-3 text-center">
                            <div class="flex flex-col items-center gap-1.5">
                                <a href="{{ route($routePrefix . 'detail') }}" class="text-xs font-semibold text-[#004ADA] hover:underline">
                                    Detail
                                </a>
                                <div class="flex items-center gap-1.5">
                                    <button type="button" onclick="openTerimaModal('Ahmad Tariq Hifzhillah', 'Lolos Wawancara', 'Diterima')" class="bg-[#004ADA] hover:bg-[#003bb0] text-white px-2.5 py-0.5 rounded-md text-[11px] font-medium transition-colors">
                                        Terima
                                    </button>
                                    <button type="button" onclick="openTolakModal('Ahmad Tariq Hifzhillah', 'Lolos Wawancara')" class="border border-red-300 text-red-600 hover:bg-red-50 px-2.5 py-0.5 rounded-md text-[11px] font-medium transition-colors">
                                        Tolak
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td class="py-3.5 pr-3 text-right">
                            <button type="button" class="text-gray-400 hover:text-gray-600 p-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 2: Alya Salsabila -->
                    <tr class="hover:bg-slate-50/60 transition-colors">
                        <td class="py-3.5 px-3 font-semibold text-[#1F1F1F]">Alya Salsabila</td>
                        <td class="py-3.5 px-3 text-[#707070]">25/512348/PA/22348</td>
                        <td class="py-3.5 px-3 text-[#707070]">Ilmu Komputer</td>
                        <td class="py-3.5 px-3 text-[#1F1F1F]">Riset & Inovasi</td>
                        <td class="py-3.5 px-3">
                            <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#EAF8F0] text-[#1E8E3E]">
                                Diterima
                            </span>
                        </td>
                        <td class="py-3.5 px-3 text-[#1F1F1F]">13 Nov 2026</td>
                        <td class="py-3.5 px-3 text-[#707070]">09.15-09.30 WIB</td>
                        <td class="py-3.5 px-3 text-center">
                            <div class="flex flex-col items-center gap-1">
                                <a href="{{ route($routePrefix . 'detail') }}" class="text-xs font-semibold text-[#004ADA] hover:underline">
                                    Detail
                                </a>
                                <span class="text-xs font-semibold text-[#1E8E3E]">Diterima</span>
                            </div>
                        </td>
                        <td class="py-3.5 pr-3 text-right">
                            <button type="button" class="text-gray-400 hover:text-gray-600 p-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 3: Arif Rahman Hakim -->
                    <tr class="hover:bg-slate-50/60 transition-colors">
                        <td class="py-3.5 px-3 font-semibold text-[#1F1F1F]">Arif Rahman Hakim</td>
                        <td class="py-3.5 px-3 text-[#707070]">25/512352/PA/22352</td>
                        <td class="py-3.5 px-3 text-[#707070]">Ilmu Komputer</td>
                        <td class="py-3.5 px-3 text-[#1F1F1F]">Humas</td>
                        <td class="py-3.5 px-3">
                            <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#FEF6EE] text-[#B54708]">
                                Lolos Berkas
                            </span>
                        </td>
                        <td class="py-3.5 px-3 text-gray-400">—</td>
                        <td class="py-3.5 px-3 text-gray-400">—</td>
                        <td class="py-3.5 px-3 text-center">
                            <div class="flex flex-col items-center gap-1">
                                <a href="{{ route($routePrefix . 'detail') }}" class="text-xs font-semibold text-[#004ADA] hover:underline">
                                    Detail
                                </a>
                                <a href="{{ route($routePrefix . 'wawancara') }}" class="text-xs font-semibold text-[#004ADA] hover:underline">
                                    Jadwalkan Wawancara
                                </a>
                            </div>
                        </td>
                        <td class="py-3.5 pr-3 text-right">
                            <button type="button" class="text-gray-400 hover:text-gray-600 p-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 4: Bagas Pratama -->
                    <tr class="hover:bg-slate-50/60 transition-colors">
                        <td class="py-3.5 px-3 font-semibold text-[#1F1F1F]">Bagas Pratama</td>
                        <td class="py-3.5 px-3 text-[#707070]">25/512351/SV/22351</td>
                        <td class="py-3.5 px-3 text-[#707070]">Teknologi Rekayasa Perangkat Lunak</td>
                        <td class="py-3.5 px-3 text-[#1F1F1F]">Teknologi</td>
                        <td class="py-3.5 px-3">
                            <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-gray-100 text-gray-700">
                                Mendaftar
                            </span>
                        </td>
                        <td class="py-3.5 px-3 text-gray-400">—</td>
                        <td class="py-3.5 px-3 text-gray-400">—</td>
                        <td class="py-3.5 px-3 text-center">
                            <div class="flex flex-col items-center gap-1.5">
                                <a href="{{ route($routePrefix . 'detail') }}" class="text-xs font-semibold text-[#004ADA] hover:underline">
                                    Detail
                                </a>
                                <div class="flex items-center gap-1.5">
                                    <button type="button" onclick="openLoloskanModal('Bagas Pratama')" class="bg-[#004ADA] hover:bg-[#003bb0] text-white px-2.5 py-0.5 rounded-md text-[11px] font-medium transition-colors">
                                        Loloskan Berkas
                                    </button>
                                    <button type="button" onclick="openTolakModal('Bagas Pratama', 'Mendaftar')" class="border border-red-300 text-red-600 hover:bg-red-50 px-2.5 py-0.5 rounded-md text-[11px] font-medium transition-colors">
                                        Tolak
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td class="py-3.5 pr-3 text-right">
                            <button type="button" class="text-gray-400 hover:text-gray-600 p-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 5: Dimas Aditya Pratama -->
                    <tr class="hover:bg-slate-50/60 transition-colors">
                        <td class="py-3.5 px-3 font-semibold text-[#1F1F1F]">Dimas Aditya Pratama</td>
                        <td class="py-3.5 px-3 text-[#707070]">25/512347/SV/22347</td>
                        <td class="py-3.5 px-3 text-[#707070]">Teknologi Rekayasa Perangkat Lunak</td>
                        <td class="py-3.5 px-3 text-[#1F1F1F]">Teknologi</td>
                        <td class="py-3.5 px-3">
                            <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#FEF6EE] text-[#B54708]">
                                Lolos Berkas
                            </span>
                        </td>
                        <td class="py-3.5 px-3 text-gray-400">—</td>
                        <td class="py-3.5 px-3 text-gray-400">—</td>
                        <td class="py-3.5 px-3 text-center">
                            <div class="flex flex-col items-center gap-1">
                                <a href="{{ route($routePrefix . 'detail') }}" class="text-xs font-semibold text-[#004ADA] hover:underline">
                                    Detail
                                </a>
                                <a href="{{ route($routePrefix . 'wawancara') }}" class="text-xs font-semibold text-[#004ADA] hover:underline">
                                    Jadwalkan Wawancara
                                </a>
                            </div>
                        </td>
                        <td class="py-3.5 pr-3 text-right">
                            <button type="button" class="text-gray-400 hover:text-gray-600 p-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 6: Fajar Muhammad Rizki -->
                    <tr class="hover:bg-slate-50/60 transition-colors">
                        <td class="py-3.5 px-3 font-semibold text-[#1F1F1F]">Fajar Muhammad Rizki</td>
                        <td class="py-3.5 px-3 text-[#707070]">25/512349/SV/22349</td>
                        <td class="py-3.5 px-3 text-[#707070]">Teknologi Rekayasa Perangkat Lunak</td>
                        <td class="py-3.5 px-3 text-[#1F1F1F]">Humas</td>
                        <td class="py-3.5 px-3">
                            <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#FEE4E2] text-[#D92D20]">
                                Tidak Lolos
                            </span>
                        </td>
                        <td class="py-3.5 px-3 text-[#1F1F1F]">13 Nov 2026</td>
                        <td class="py-3.5 px-3 text-[#707070]">09.30-09.45 WIB</td>
                        <td class="py-3.5 px-3 text-center">
                            <div class="flex flex-col items-center gap-1">
                                <a href="{{ route($routePrefix . 'detail') }}" class="text-xs font-semibold text-[#004ADA] hover:underline">
                                    Detail
                                </a>
                                <span class="text-xs font-semibold text-[#D92D20]">Tidak lolos</span>
                            </div>
                        </td>
                        <td class="py-3.5 pr-3 text-right">
                            <button type="button" class="text-gray-400 hover:text-gray-600 p-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 7: Nadia Putri Maharani -->
                    <tr class="hover:bg-slate-50/60 transition-colors">
                        <td class="py-3.5 px-3 font-semibold text-[#1F1F1F]">Nadia Putri Maharani</td>
                        <td class="py-3.5 px-3 text-[#707070]">25/512346/PA/22346</td>
                        <td class="py-3.5 px-3 text-[#707070]">Ilmu Komputer</td>
                        <td class="py-3.5 px-3 text-[#1F1F1F]">Media Kreatif</td>
                        <td class="py-3.5 px-3">
                            <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-gray-100 text-gray-700">
                                Mendaftar
                            </span>
                        </td>
                        <td class="py-3.5 px-3 text-gray-400">—</td>
                        <td class="py-3.5 px-3 text-gray-400">—</td>
                        <td class="py-3.5 px-3 text-center">
                            <div class="flex flex-col items-center gap-1.5">
                                <a href="{{ route($routePrefix . 'detail') }}" class="text-xs font-semibold text-[#004ADA] hover:underline">
                                    Detail
                                </a>
                                <div class="flex items-center gap-1.5">
                                    <button type="button" onclick="openLoloskanModal('Nadia Putri Maharani')" class="bg-[#004ADA] hover:bg-[#003bb0] text-white px-2.5 py-0.5 rounded-md text-[11px] font-medium transition-colors">
                                        Loloskan Berkas
                                    </button>
                                    <button type="button" onclick="openTolakModal('Nadia Putri Maharani', 'Mendaftar')" class="border border-red-300 text-red-600 hover:bg-red-50 px-2.5 py-0.5 rounded-md text-[11px] font-medium transition-colors">
                                        Tolak
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td class="py-3.5 pr-3 text-right">
                            <button type="button" class="text-gray-400 hover:text-gray-600 p-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 8: Sekar Ayu Wulandari -->
                    <tr class="hover:bg-slate-50/60 transition-colors">
                        <td class="py-3.5 px-3 font-semibold text-[#1F1F1F]">Sekar Ayu Wulandari</td>
                        <td class="py-3.5 px-3 text-[#707070]">25/512350/PA/22350</td>
                        <td class="py-3.5 px-3 text-[#707070]">Ilmu Komputer</td>
                        <td class="py-3.5 px-3 text-[#1F1F1F]">Media Kreatif</td>
                        <td class="py-3.5 px-3">
                            <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#FEF6EE] text-[#B54708]">
                                Lolos Berkas
                            </span>
                        </td>
                        <td class="py-3.5 px-3 text-[#1F1F1F]">16 Nov 2026</td>
                        <td class="py-3.5 px-3 text-[#707070]">09.00-09.15 WIB</td>
                        <td class="py-3.5 px-3 text-center">
                            <div class="flex flex-col items-center gap-1">
                                <a href="{{ route($routePrefix . 'detail') }}" class="text-xs font-semibold text-[#004ADA] hover:underline">
                                    Detail
                                </a>
                                <span class="text-xs font-medium text-[#707070]">Terjadwal</span>
                            </div>
                        </td>
                        <td class="py-3.5 pr-3 text-right">
                            <button type="button" class="text-gray-400 hover:text-gray-600 p-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination & Counter Footer -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-3 pt-6 mt-4 border-t border-gray-100 text-xs text-[#707070]">
            <div>Menampilkan 1-8 dari 8 pendaftar</div>
            <div class="flex items-center gap-3">
                <span>8 per halaman</span>
                <div class="flex items-center gap-1">
                    <button type="button" class="w-7 h-7 rounded-lg border border-gray-200 text-gray-400 flex items-center justify-center hover:bg-gray-50 transition-colors" disabled>
                        &lt;
                    </button>
                    <span class="w-7 h-7 rounded-lg bg-[#004ADA] text-white flex items-center justify-center font-bold text-xs shadow-xs">
                        1
                    </span>
                    <button type="button" class="w-7 h-7 rounded-lg border border-gray-200 text-gray-400 flex items-center justify-center hover:bg-gray-50 transition-colors" disabled>
                        &gt;
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- MODAL: TERIMA PENDAFTAR                                        -->
<!-- ============================================================== -->
<div id="modal-terima" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/40 hidden">
    <div class="bg-white rounded-[24px] max-w-md w-full p-6 shadow-2xl border border-gray-100">
        <h3 class="text-lg font-bold text-[#1F1F1F] mb-2">Terima pendaftar?</h3>
        <p id="modal-terima-desc" class="text-xs text-[#707070] leading-relaxed mb-6">
            Ahmad Tariq Hifzhillah akan dipindahkan dari Lolos Wawancara ke Diterima sebagai anggota KMID.
        </p>
        <div class="flex items-center justify-end gap-3 pt-3 border-t border-gray-100">
            <button type="button" onclick="closeTerimaModal()" class="px-4 py-2 border border-gray-200 rounded-xl text-xs font-medium text-[#707070] hover:text-[#1F1F1F] hover:bg-gray-50 transition-colors">
                Batal
            </button>
            <button type="button" onclick="closeTerimaModal(); alert('Pendaftar berhasil diterima!')" class="px-5 py-2 bg-[#004ADA] hover:bg-[#003bb0] text-white rounded-xl text-xs font-semibold shadow-xs transition-colors">
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
        <p id="modal-tolak-desc" class="text-xs text-[#707070] leading-relaxed mb-6">
            Nadia Putri Maharani akan dipindahkan dari Mendaftar ke Tidak Lolos. Pastikan hasil pemeriksaan berkas sudah sesuai.
        </p>
        <div class="flex items-center justify-end gap-3 pt-3 border-t border-gray-100">
            <button type="button" onclick="closeTolakModal()" class="px-4 py-2 border border-gray-200 rounded-xl text-xs font-medium text-[#707070] hover:text-[#1F1F1F] hover:bg-gray-50 transition-colors">
                Batal
            </button>
            <button type="button" onclick="closeTolakModal(); alert('Pendaftar telah ditolak!')" class="px-5 py-2 bg-[#D92D20] hover:bg-red-700 text-white rounded-xl text-xs font-semibold shadow-xs transition-colors">
                Tolak
            </button>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- MODAL: LOLOSKAN BERKAS                                         -->
<!-- ============================================================== -->
<div id="modal-loloskan" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/40 hidden">
    <div class="bg-white rounded-[24px] max-w-md w-full p-6 shadow-2xl border border-gray-100">
        <h3 class="text-lg font-bold text-[#1F1F1F] mb-2">Loloskan berkas pendaftar?</h3>
        <p id="modal-loloskan-desc" class="text-xs text-[#707070] leading-relaxed mb-6">
            Nadia Putri Maharani akan dipindahkan dari Mendaftar ke Lolos Berkas. Pendaftar kemudian dapat dijadwalkan untuk wawancara.
        </p>
        <div class="flex items-center justify-end gap-3 pt-3 border-t border-gray-100">
            <button type="button" onclick="closeLoloskanModal()" class="px-4 py-2 border border-gray-200 rounded-xl text-xs font-medium text-[#707070] hover:text-[#1F1F1F] hover:bg-gray-50 transition-colors">
                Batal
            </button>
            <button type="button" onclick="closeLoloskanModal(); alert('Berkas pendaftar berhasil diloloskan!')" class="px-5 py-2 bg-[#004ADA] hover:bg-[#003bb0] text-white rounded-xl text-xs font-semibold shadow-xs transition-colors">
                Loloskan Berkas
            </button>
        </div>
    </div>
</div>

<script>
    function openTerimaModal(nama, dari, ke) {
        document.getElementById('modal-terima-desc').textContent = `${nama} akan dipindahkan dari ${dari} ke ${ke} sebagai anggota KMID.`;
        document.getElementById('modal-terima').classList.remove('hidden');
    }
    function closeTerimaModal() {
        document.getElementById('modal-terima').classList.add('hidden');
    }

    function openTolakModal(nama, dari) {
        document.getElementById('modal-tolak-desc').textContent = `${nama} akan dipindahkan dari ${dari} ke Tidak Lolos. Pastikan hasil pemeriksaan berkas sudah sesuai.`;
        document.getElementById('modal-tolak').classList.remove('hidden');
    }
    function closeTolakModal() {
        document.getElementById('modal-tolak').classList.add('hidden');
    }

    function openLoloskanModal(nama) {
        document.getElementById('modal-loloskan-desc').textContent = `${nama} akan dipindahkan dari Mendaftar ke Lolos Berkas. Pendaftar kemudian dapat dijadwalkan untuk wawancara.`;
        document.getElementById('modal-loloskan').classList.remove('hidden');
    }
    function closeLoloskanModal() {
        document.getElementById('modal-loloskan').classList.add('hidden');
    }
</script>
@endsection
