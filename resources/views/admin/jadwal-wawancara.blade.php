@php
    $isStaff = request()->is('staff*');
    $routePrefix = $isStaff ? 'staff.pendaftar.' : 'admin.pendaftar.';
    $portalLabel = $isStaff ? 'Staff KMID' : 'Admin KMID';
    $roleName = $isStaff ? 'Staff Managerial' : 'Administrator';
@endphp

@extends('layouts.admin')

@section('title', $portalLabel . ' - Jadwal Wawancara')
@section('topbar_breadcrumb', $portalLabel . ' / Jadwal Wawancara')
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
            <span class="text-[#1F1F1F] font-medium">Jadwal Wawancara</span>
        </nav>
        <h1 class="text-2xl sm:text-3xl font-bold text-[#1F1F1F] tracking-tight">Jadwal Wawancara</h1>
        <!-- Orange Accent Bar under Heading -->
        <div class="w-14 h-1 bg-[#FEA515] rounded-full mt-2"></div>
    </div>

    <!-- Main Card -->
    <div class="bg-white rounded-[24px] sm:rounded-[28px] p-6 sm:p-8 lg:p-10 shadow-[0_10px_35px_rgba(0,0,0,0.03)] border border-gray-100/90">
        <!-- Card Header: Title & Action Button -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-[#1F1F1F]">Jadwal wawancara</h2>
                <p class="text-xs text-[#707070] mt-0.5">8 slot</p>
            </div>
            <div>
                <a href="{{ route($routePrefix . 'tambah-jadwal') }}" class="inline-flex items-center justify-center bg-[#004ADA] hover:bg-[#003bb0] text-white font-medium text-xs sm:text-sm px-4 py-2 rounded-xl shadow-[0_4px_14px_rgba(0,74,218,0.25)] transition-all duration-200">
                    + Tambah Jadwal
                </a>
            </div>
        </div>

        <!-- Filter Controls & View Switcher Row -->
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-6">
            <!-- Dropdown Filters (Tanggal, Pewawancara, Status Slot) -->
            <div class="flex flex-wrap items-center gap-3">
                <!-- Filter Tanggal -->
                <div class="relative min-w-[150px]">
                    <label class="block text-[11px] text-[#707070] mb-1 font-medium">Tanggal</label>
                    <div class="relative">
                        <select class="w-full appearance-none bg-white border border-gray-200 rounded-xl px-3 py-2 pr-8 text-xs text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] cursor-pointer">
                            <option selected>Semua tanggal</option>
                            <option>13 November 2026</option>
                            <option>16 November 2026</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2.5 text-gray-400">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Filter Pewawancara -->
                <div class="relative min-w-[160px]">
                    <label class="block text-[11px] text-[#707070] mb-1 font-medium">Pewawancara</label>
                    <div class="relative">
                        <select class="w-full appearance-none bg-white border border-gray-200 rounded-xl px-3 py-2 pr-8 text-xs text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] cursor-pointer">
                            <option selected>Semua pewawancara</option>
                            <option>Dwi Putri Lestari</option>
                            <option>Rizky Aditya</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2.5 text-gray-400">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Filter Status Slot -->
                <div class="relative min-w-[140px]">
                    <label class="block text-[11px] text-[#707070] mb-1 font-medium">Status slot</label>
                    <div class="relative">
                        <select class="w-full appearance-none bg-white border border-gray-200 rounded-xl px-3 py-2 pr-8 text-xs text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] cursor-pointer">
                            <option selected>Semua status</option>
                            <option>Terisi</option>
                            <option>Tersedia</option>
                            <option>Dibatalkan</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2.5 text-gray-400">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- View Switcher (Daftar / Kalender) -->
            <div class="flex items-center gap-2 self-start lg:self-end mt-2 lg:mt-0">
                <span class="text-xs text-[#707070] mr-1">Tampilan</span>
                <div class="flex items-center p-1 bg-gray-100 rounded-xl border border-gray-200/60">
                    <button type="button" id="tab-btn-daftar" class="px-3.5 py-1.5 rounded-lg text-xs font-semibold bg-[#004ADA] text-white shadow-xs transition-colors">
                        Daftar
                    </button>
                    <button type="button" id="tab-btn-kalender" class="px-3.5 py-1.5 rounded-lg text-xs font-medium text-[#707070] hover:text-[#1F1F1F] transition-colors">
                        Kalender
                    </button>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- VIEW 1: DAFTAR VIEW                                            -->
        <!-- ============================================================== -->
        <div id="view-daftar" class="space-y-6">
            <!-- Group 1: Jumat, 13 November 2026 -->
            <div class="border border-gray-200/90 rounded-2xl overflow-hidden">
                <!-- Group Header Banner -->
                <div class="bg-gray-50/80 px-4 py-3 border-b border-gray-200/80 flex items-center justify-between">
                    <span class="font-bold text-xs sm:text-sm text-[#1F1F1F]">Jumat, 13 November 2026</span>
                    <span class="text-xs text-[#707070]">4 slot · 1 tersedia</span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse min-w-[700px] text-xs">
                        <thead>
                            <tr class="border-b border-gray-100 text-[11px] font-semibold text-[#8E8E93] uppercase tracking-wider bg-white">
                                <th class="py-2.5 px-4 w-32">Tanggal</th>
                                <th class="py-2.5 px-4 w-36">Jam</th>
                                <th class="py-2.5 px-4">Pewawancara</th>
                                <th class="py-2.5 px-4 w-24">Mode</th>
                                <th class="py-2.5 px-4 w-28">Status slot</th>
                                <th class="py-2.5 px-4">Pendaftar</th>
                                <th class="py-2.5 pr-4 w-12 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            <!-- Slot 1 -->
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="py-3 px-4 font-medium text-[#1F1F1F]">13 Nov 2026</td>
                                <td class="py-3 px-4 font-semibold text-[#1F1F1F]">09.00-09.15 WIB</td>
                                <td class="py-3 px-4 text-[#707070] leading-tight">Dwi Putri Lestari<br>Rizky Aditya</td>
                                <td class="py-3 px-4 font-medium text-[#1F1F1F]">Offline</td>
                                <td class="py-3 px-4">
                                    <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#EBF2FE] text-[#004ADA]">
                                        Terisi
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <p class="font-semibold text-[#1F1F1F]">Ahmad Tariq Hifzhillah</p>
                                    <p class="text-[11px] text-[#707070]">25/512345/SV/22345</p>
                                </td>
                                <td class="py-3 pr-4 text-center">
                                    <button type="button" class="text-gray-400 hover:text-gray-600 p-1">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                            <!-- Slot 2 -->
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="py-3 px-4 font-medium text-[#1F1F1F]">13 Nov 2026</td>
                                <td class="py-3 px-4 font-semibold text-[#1F1F1F]">09.15-09.30 WIB</td>
                                <td class="py-3 px-4 text-[#707070] leading-tight">Dwi Putri Lestari<br>Rizky Aditya</td>
                                <td class="py-3 px-4 font-medium text-[#1F1F1F]">Offline</td>
                                <td class="py-3 px-4">
                                    <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#EBF2FE] text-[#004ADA]">
                                        Terisi
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <p class="font-semibold text-[#1F1F1F]">Alya Salsabila</p>
                                    <p class="text-[11px] text-[#707070]">25/512348/PA/22348</p>
                                </td>
                                <td class="py-3 pr-4 text-center">
                                    <button type="button" class="text-gray-400 hover:text-gray-600 p-1">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                            <!-- Slot 3 -->
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="py-3 px-4 font-medium text-[#1F1F1F]">13 Nov 2026</td>
                                <td class="py-3 px-4 font-semibold text-[#1F1F1F]">09.30-09.45 WIB</td>
                                <td class="py-3 px-4 text-[#707070] leading-tight">Dwi Putri Lestari<br>Rizky Aditya</td>
                                <td class="py-3 px-4 font-medium text-[#1F1F1F]">Offline</td>
                                <td class="py-3 px-4">
                                    <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#EBF2FE] text-[#004ADA]">
                                        Terisi
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <p class="font-semibold text-[#1F1F1F]">Fajar Muhammad Rizki</p>
                                    <p class="text-[11px] text-[#707070]">25/512349/SV/22349</p>
                                </td>
                                <td class="py-3 pr-4 text-center">
                                    <button type="button" class="text-gray-400 hover:text-gray-600 p-1">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                            <!-- Slot 4: Tersedia -->
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="py-3 px-4 font-medium text-[#1F1F1F]">13 Nov 2026</td>
                                <td class="py-3 px-4 font-semibold text-[#1F1F1F]">09.45-10.00 WIB</td>
                                <td class="py-3 px-4 text-[#707070] leading-tight">Dwi Putri Lestari<br>Rizky Aditya</td>
                                <td class="py-3 px-4 font-medium text-[#1F1F1F]">Offline</td>
                                <td class="py-3 px-4">
                                    <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#EAF8F0] text-[#1E8E3E]">
                                        Tersedia
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <button type="button" onclick="openJadwalkanModal('Jumat, 13 November 2026', '09.45-10.00 WIB', 'Offline', 'Dwi Putri Lestari & Rizky Aditya')" class="inline-flex items-center gap-1 px-3 py-1 bg-white border border-[#004ADA] text-[#004ADA] hover:bg-blue-50 rounded-lg text-xs font-semibold transition-colors">
                                        Pilih pendaftar
                                    </button>
                                </td>
                                <td class="py-3 pr-4 text-center">
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
            </div>

            <!-- Group 2: Senin, 16 November 2026 -->
            <div class="border border-gray-200/90 rounded-2xl overflow-hidden">
                <!-- Group Header Banner -->
                <div class="bg-gray-50/80 px-4 py-3 border-b border-gray-200/80 flex items-center justify-between">
                    <span class="font-bold text-xs sm:text-sm text-[#1F1F1F]">Senin, 16 November 2026</span>
                    <span class="text-xs text-[#707070]">4 slot · 2 tersedia</span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse min-w-[700px] text-xs">
                        <thead>
                            <tr class="border-b border-gray-100 text-[11px] font-semibold text-[#8E8E93] uppercase tracking-wider bg-white">
                                <th class="py-2.5 px-4 w-32">Tanggal</th>
                                <th class="py-2.5 px-4 w-36">Jam</th>
                                <th class="py-2.5 px-4">Pewawancara</th>
                                <th class="py-2.5 px-4 w-24">Mode</th>
                                <th class="py-2.5 px-4 w-28">Status slot</th>
                                <th class="py-2.5 px-4">Pendaftar</th>
                                <th class="py-2.5 pr-4 w-12 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            <!-- Slot 1 -->
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="py-3 px-4 font-medium text-[#1F1F1F]">16 Nov 2026</td>
                                <td class="py-3 px-4 font-semibold text-[#1F1F1F]">09.00-09.15 WIB</td>
                                <td class="py-3 px-4 text-[#707070] leading-tight">Dwi Putri Lestari<br>Rizky Aditya</td>
                                <td class="py-3 px-4 font-medium text-[#1F1F1F]">Online</td>
                                <td class="py-3 px-4">
                                    <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#EBF2FE] text-[#004ADA]">
                                        Terisi
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <p class="font-semibold text-[#1F1F1F]">Sekar Ayu Wulandari</p>
                                    <p class="text-[11px] text-[#707070]">25/512350/PA/22350</p>
                                </td>
                                <td class="py-3 pr-4 text-center">
                                    <button type="button" class="text-gray-400 hover:text-gray-600 p-1">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                            <!-- Slot 2: Tersedia -->
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="py-3 px-4 font-medium text-[#1F1F1F]">16 Nov 2026</td>
                                <td class="py-3 px-4 font-semibold text-[#1F1F1F]">09.15-09.30 WIB</td>
                                <td class="py-3 px-4 text-[#707070] leading-tight">Dwi Putri Lestari<br>Rizky Aditya</td>
                                <td class="py-3 px-4 font-medium text-[#1F1F1F]">Online</td>
                                <td class="py-3 px-4">
                                    <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#EAF8F0] text-[#1E8E3E]">
                                        Tersedia
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <button type="button" onclick="openJadwalkanModal('Senin, 16 November 2026', '09.15-09.30 WIB', 'Online', 'Dwi Putri Lestari & Rizky Aditya')" class="inline-flex items-center gap-1 px-3 py-1 bg-white border border-[#004ADA] text-[#004ADA] hover:bg-blue-50 rounded-lg text-xs font-semibold transition-colors">
                                        Pilih pendaftar
                                    </button>
                                </td>
                                <td class="py-3 pr-4 text-center">
                                    <button type="button" class="text-gray-400 hover:text-gray-600 p-1">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                            <!-- Slot 3: Tersedia -->
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="py-3 px-4 font-medium text-[#1F1F1F]">16 Nov 2026</td>
                                <td class="py-3 px-4 font-semibold text-[#1F1F1F]">09.30-09.45 WIB</td>
                                <td class="py-3 px-4 text-[#707070] leading-tight">Dwi Putri Lestari<br>Rizky Aditya</td>
                                <td class="py-3 px-4 font-medium text-[#1F1F1F]">Online</td>
                                <td class="py-3 px-4">
                                    <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#EAF8F0] text-[#1E8E3E]">
                                        Tersedia
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <button type="button" onclick="openJadwalkanModal('Senin, 16 November 2026', '09.30-09.45 WIB', 'Online', 'Dwi Putri Lestari & Rizky Aditya')" class="inline-flex items-center gap-1 px-3 py-1 bg-white border border-[#004ADA] text-[#004ADA] hover:bg-blue-50 rounded-lg text-xs font-semibold transition-colors">
                                        Pilih pendaftar
                                    </button>
                                </td>
                                <td class="py-3 pr-4 text-center">
                                    <button type="button" class="text-gray-400 hover:text-gray-600 p-1">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                            <!-- Slot 4: Dibatalkan -->
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="py-3 px-4 font-medium text-[#1F1F1F]">16 Nov 2026</td>
                                <td class="py-3 px-4 font-semibold text-[#1F1F1F]">09.45-10.00 WIB</td>
                                <td class="py-3 px-4 text-[#707070] leading-tight">Dwi Putri Lestari<br>Rizky Aditya</td>
                                <td class="py-3 px-4 font-medium text-[#1F1F1F]">Online</td>
                                <td class="py-3 px-4">
                                    <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-gray-100 text-gray-500">
                                        Dibatalkan
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-gray-400">—</td>
                                <td class="py-3 pr-4 text-center">
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
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- VIEW 2: KALENDER VIEW (Hidden by default, toggled via JS)       -->
        <!-- ============================================================== -->
        <div id="view-kalender" class="hidden space-y-4">
            <!-- Calendar Navigation Header -->
            <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                <h3 class="font-bold text-sm sm:text-base text-[#1F1F1F]">November 2026</h3>
                <div class="flex items-center gap-1.5">
                    <button type="button" class="p-1.5 rounded-lg border border-gray-200 text-gray-400 hover:text-gray-600 hover:bg-gray-50">
                        &lt;
                    </button>
                    <button type="button" class="p-1.5 rounded-lg border border-gray-200 text-gray-400 hover:text-gray-600 hover:bg-gray-50">
                        &gt;
                    </button>
                </div>
            </div>

            <!-- Calendar Grid (7 columns: Senin - Minggu) -->
            <div class="grid grid-cols-7 gap-px bg-gray-200 rounded-2xl overflow-hidden border border-gray-200 text-xs">
                <!-- Days Header -->
                <div class="bg-gray-50 py-2.5 text-center font-semibold text-[#707070]">Senin</div>
                <div class="bg-gray-50 py-2.5 text-center font-semibold text-[#707070]">Selasa</div>
                <div class="bg-gray-50 py-2.5 text-center font-semibold text-[#707070]">Rabu</div>
                <div class="bg-gray-50 py-2.5 text-center font-semibold text-[#707070]">Kamis</div>
                <div class="bg-gray-50 py-2.5 text-center font-semibold text-[#707070]">Jumat</div>
                <div class="bg-gray-50 py-2.5 text-center font-semibold text-[#707070]">Sabtu</div>
                <div class="bg-gray-50 py-2.5 text-center font-semibold text-[#707070]">Minggu</div>

                <!-- Week 1: Oct 26 - Nov 1 -->
                <div class="bg-white min-h-[90px] p-2 text-gray-300">26</div>
                <div class="bg-white min-h-[90px] p-2 text-gray-300">27</div>
                <div class="bg-white min-h-[90px] p-2 text-gray-300">28</div>
                <div class="bg-white min-h-[90px] p-2 text-gray-300">29</div>
                <div class="bg-white min-h-[90px] p-2 text-gray-300">30</div>
                <div class="bg-white min-h-[90px] p-2 text-gray-300">31</div>
                <div class="bg-white min-h-[90px] p-2 text-[#1F1F1F] font-semibold">1</div>

                <!-- Week 2: Nov 2 - Nov 8 -->
                <div class="bg-white min-h-[90px] p-2 text-[#1F1F1F] font-semibold">2</div>
                <div class="bg-white min-h-[90px] p-2 text-[#1F1F1F] font-semibold">3</div>
                <div class="bg-white min-h-[90px] p-2 text-[#1F1F1F] font-semibold">4</div>
                <div class="bg-white min-h-[90px] p-2 text-[#1F1F1F] font-semibold">5</div>
                <div class="bg-white min-h-[90px] p-2 text-[#1F1F1F] font-semibold">6</div>
                <div class="bg-white min-h-[90px] p-2 text-[#1F1F1F] font-semibold">7</div>
                <div class="bg-white min-h-[90px] p-2 text-[#1F1F1F] font-semibold">8</div>

                <!-- Week 3: Nov 9 - Nov 15 (Contains Friday 13 event!) -->
                <div class="bg-white min-h-[90px] p-2 text-[#1F1F1F] font-semibold">9</div>
                <div class="bg-white min-h-[90px] p-2 text-[#1F1F1F] font-semibold">10</div>
                <div class="bg-white min-h-[90px] p-2 text-[#1F1F1F] font-semibold">11</div>
                <div class="bg-white min-h-[90px] p-2 text-[#1F1F1F] font-semibold">12</div>
                <div class="bg-blue-50/40 min-h-[90px] p-2 text-[#004ADA] font-bold">
                    <span>13</span>
                    <div class="mt-1 p-1.5 rounded-lg bg-[#EBF2FE] border border-blue-200/60 text-[10px] text-[#004ADA] font-medium leading-tight">
                        <p class="font-bold">09.00-10.00 WIB</p>
                        <p class="text-[9px] text-[#707070] mt-0.5">1 tersedia · 3 terisi</p>
                    </div>
                </div>
                <div class="bg-white min-h-[90px] p-2 text-[#1F1F1F] font-semibold">14</div>
                <div class="bg-white min-h-[90px] p-2 text-[#1F1F1F] font-semibold">15</div>

                <!-- Week 4: Nov 16 - Nov 22 (Contains Monday 16 event!) -->
                <div class="bg-blue-50/40 min-h-[90px] p-2 text-[#004ADA] font-bold">
                    <span>16</span>
                    <div class="mt-1 p-1.5 rounded-lg bg-[#EBF2FE] border border-blue-200/60 text-[10px] text-[#004ADA] font-medium leading-tight">
                        <p class="font-bold">09.00-10.00 WIB</p>
                        <p class="text-[9px] text-[#707070] mt-0.5">2 tersedia · 1 terisi · 1 dibatalkan</p>
                    </div>
                </div>
                <div class="bg-white min-h-[90px] p-2 text-[#1F1F1F] font-semibold">17</div>
                <div class="bg-white min-h-[90px] p-2 text-[#1F1F1F] font-semibold">18</div>
                <div class="bg-white min-h-[90px] p-2 text-[#1F1F1F] font-semibold">19</div>
                <div class="bg-white min-h-[90px] p-2 text-[#1F1F1F] font-semibold">20</div>
                <div class="bg-white min-h-[90px] p-2 text-[#1F1F1F] font-semibold">21</div>
                <div class="bg-white min-h-[90px] p-2 text-[#1F1F1F] font-semibold">22</div>

                <!-- Week 5: Nov 23 - Nov 30 -->
                <div class="bg-white min-h-[90px] p-2 text-[#1F1F1F] font-semibold">23</div>
                <div class="bg-white min-h-[90px] p-2 text-[#1F1F1F] font-semibold">24</div>
                <div class="bg-white min-h-[90px] p-2 text-[#1F1F1F] font-semibold">25</div>
                <div class="bg-white min-h-[90px] p-2 text-[#1F1F1F] font-semibold">26</div>
                <div class="bg-white min-h-[90px] p-2 text-[#1F1F1F] font-semibold">27</div>
                <div class="bg-white min-h-[90px] p-2 text-[#1F1F1F] font-semibold">28</div>
                <div class="bg-white min-h-[90px] p-2 text-[#1F1F1F] font-semibold">29</div>
            </div>
        </div>

        <!-- Card Footer Info -->
        <div class="mt-6 pt-5 border-t border-gray-100 flex flex-col sm:flex-row items-start sm:items-center justify-between text-xs text-[#707070] gap-2">
            <div>
                <span class="font-semibold text-[#1F1F1F]">8 slot</span> · Durasi per sesi 15 menit
            </div>
            <div>
                Semua waktu dalam WIB
            </div>
        </div>
        <p class="text-[11px] text-[#8E8E93] mt-2 leading-relaxed">
            Hanya pendaftar berstatus Lolos Berkas yang dapat dijadwalkan. Slot terisi tersinkron dengan tanggal dan jam wawancara pada Kelola Akun.
        </p>
    </div>
</div>

<!-- ============================================================== -->
<!-- MODAL: JADWALKAN PENDAFTAR                                     -->
<!-- ============================================================== -->
<div id="modal-jadwalkan" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/40 hidden">
    <div class="bg-white rounded-[24px] max-w-lg w-full p-6 sm:p-7 shadow-2xl border border-gray-100 transform transition-all">
        <h3 class="text-lg font-bold text-[#1F1F1F] mb-4">Jadwalkan wawancara</h3>

        <!-- Session Detail Box -->
        <div class="bg-gray-50 border border-gray-200/80 rounded-2xl p-4 mb-5 text-xs text-[#1F1F1F] space-y-1">
            <p id="modal-session-datetime" class="font-semibold">Jumat, 13 November 2026 · 09.45-10.00 WIB · Offline</p>
            <p id="modal-session-interviewers" class="text-[#707070]">Dwi Putri Lestari & Rizky Aditya</p>
        </div>

        <!-- Select Pendaftar -->
        <div class="mb-4">
            <label class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                Pendaftar <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <select class="w-full appearance-none bg-white border border-gray-200 rounded-xl px-4 py-2.5 pr-8 text-xs text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] cursor-pointer">
                    <option selected>Dimas Aditya Pratama (25/512347/SV/22347) - Lolos Berkas</option>
                    <option>Arif Rahman Hakim (25/512352/PA/22352) - Lolos Berkas</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
            </div>
            <p class="text-[11px] text-[#8E8E93] mt-1.5">Hanya pendaftar Lolos Berkas yang belum memiliki slot dapat dipilih.</p>
        </div>

        <!-- Notification Checkboxes -->
        <div class="space-y-2 mb-6 text-xs text-[#1F1F1F]">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" checked class="rounded border-gray-300 text-[#004ADA] focus:ring-[#004ADA]">
                <span>Kirim notifikasi jadwal ke pendaftar</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" checked class="rounded border-gray-300 text-[#004ADA] focus:ring-[#004ADA]">
                <span>Kirim pengingat wawancara</span>
            </label>
        </div>

        <!-- Modal Actions -->
        <div class="flex items-center justify-end gap-3 pt-3 border-t border-gray-100">
            <button type="button" onclick="closeJadwalkanModal()" class="px-4 py-2 border border-gray-200 rounded-xl text-xs font-medium text-[#707070] hover:text-[#1F1F1F] hover:bg-gray-50 transition-colors">
                Batal
            </button>
            <button type="button" onclick="confirmJadwalkan()" class="px-5 py-2 bg-[#004ADA] hover:bg-[#003bb0] text-white rounded-xl text-xs font-semibold shadow-xs transition-colors">
                Jadwalkan
            </button>
        </div>
    </div>
</div>

<!-- Interactive Switcher & Modal Script -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btnDaftar = document.getElementById('tab-btn-daftar');
        const btnKalender = document.getElementById('tab-btn-kalender');
        const viewDaftar = document.getElementById('view-daftar');
        const viewKalender = document.getElementById('view-kalender');

        btnDaftar.addEventListener('click', () => {
            btnDaftar.classList.add('bg-[#004ADA]', 'text-white', 'shadow-xs');
            btnDaftar.classList.remove('text-[#707070]');
            btnKalender.classList.remove('bg-[#004ADA]', 'text-white', 'shadow-xs');
            btnKalender.classList.add('text-[#707070]');
            viewDaftar.classList.remove('hidden');
            viewKalender.classList.add('hidden');
        });

        btnKalender.addEventListener('click', () => {
            btnKalender.classList.add('bg-[#004ADA]', 'text-white', 'shadow-xs');
            btnKalender.classList.remove('text-[#707070]');
            btnDaftar.classList.remove('bg-[#004ADA]', 'text-white', 'shadow-xs');
            btnDaftar.classList.add('text-[#707070]');
            viewKalender.classList.remove('hidden');
            viewDaftar.classList.add('hidden');
        });
    });

    function openJadwalkanModal(date, time, mode, interviewers) {
        document.getElementById('modal-session-datetime').textContent = `${date} · ${time} · ${mode}`;
        document.getElementById('modal-session-interviewers').textContent = interviewers;
        document.getElementById('modal-jadwalkan').classList.remove('hidden');
    }

    function closeJadwalkanModal() {
        document.getElementById('modal-jadwalkan').classList.add('hidden');
    }

    function confirmJadwalkan() {
        closeJadwalkanModal();
        alert('Pendaftar berhasil dijadwalkan!');
    }
</script>
@endsection
