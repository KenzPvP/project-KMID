@extends('layouts.admin')
@section('show_content_management', true)

@section('title', 'Admin KMID - Persyaratan & Guidebook')
@section('topbar_breadcrumb', 'Admin KMID / Persyaratan & Guidebook')

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
                <span class="text-[#1F1F1F] font-medium">Persyaratan & Guidebook</span>
            </nav>
            <h1 class="text-2xl sm:text-3xl font-bold text-[#1F1F1F] tracking-tight">Persyaratan & Guidebook</h1>
            <p class="text-xs sm:text-sm text-[#707070] mt-1">Kelola syarat tiap divisi dan PDF panduan rekrutmen untuk calon anggota KMID.</p>
        </div>

        <!-- Header CTA Button -->
        <div>
            <button type="button" class="inline-flex items-center justify-center bg-[#004ADA] hover:bg-[#003bb0] text-white font-medium text-xs sm:text-sm px-5 py-2.5 rounded-xl shadow-[0_4px_14px_rgba(0,74,218,0.25)] transition-all duration-200">
                Tambah Persyaratan
            </button>
        </div>
    </div>

    <!-- Main Table Card -->
    <div class="bg-white rounded-[24px] sm:rounded-[28px] p-6 sm:p-8 lg:p-10 shadow-[0_10px_35px_rgba(0,0,0,0.03)] border border-gray-100/90">
        <!-- Card Header Info -->
        <div class="mb-6">
            <h2 class="text-lg sm:text-xl font-bold text-[#1F1F1F]">Persyaratan per divisi</h2>
            <p class="text-xs text-[#707070] mt-0.5">7 divisi · 1 dipublikasikan · 6 draf contoh</p>
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
                       placeholder="Cari divisi atau persyaratan..." 
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
        </div>

        <!-- Table Responsive Container -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[700px]">
                <thead>
                    <tr class="border-b border-gray-100 text-[11px] font-semibold text-[#8E8E93] uppercase tracking-wider">
                        <th class="pb-3.5 pr-4 w-52">Divisi</th>
                        <th class="pb-3.5 px-4">Ringkasan persyaratan</th>
                        <th class="pb-3.5 px-4 w-40">Publikasi</th>
                        <th class="pb-3.5 pl-4 w-28 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100/90 text-xs sm:text-sm">
                    <!-- Row 1 -->
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="py-4 pr-4 align-top">
                            <span class="font-bold text-[#1F1F1F] text-xs sm:text-sm">Media Creative</span>
                        </td>
                        <td class="py-4 px-4 align-top">
                            <p class="text-xs text-[#707070] leading-relaxed">Figma, Design Thinking, kolaborasi & portofolio</p>
                        </td>
                        <td class="py-4 px-4 align-top">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#EAF8F0] text-[#1E8E3E]">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#1E8E3E]"></span>
                                Dipublikasikan
                            </span>
                        </td>
                        <td class="py-4 pl-4 align-top text-center">
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
                        <td class="py-4 pr-4 align-top">
                            <span class="font-bold text-[#1F1F1F] text-xs sm:text-sm">Humas & Publikasi</span>
                        </td>
                        <td class="py-4 px-4 align-top">
                            <p class="text-xs text-[#707070] leading-relaxed">Komunikasi, penulisan publikasi & kerja tim</p>
                            <p class="text-[11px] text-gray-400 mt-0.5">Contoh data · belum tayang</p>
                        </td>
                        <td class="py-4 px-4 align-top">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#FEF6EE] text-[#B54708]">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#F79009]"></span>
                                Draf
                            </span>
                        </td>
                        <td class="py-4 pl-4 align-top text-center">
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
                        <td class="py-4 pr-4 align-top">
                            <span class="font-bold text-[#1F1F1F] text-xs sm:text-sm">Perlombaan</span>
                        </td>
                        <td class="py-4 px-4 align-top">
                            <p class="text-xs text-[#707070] leading-relaxed">Koordinasi kompetisi & administrasi delegasi</p>
                            <p class="text-[11px] text-gray-400 mt-0.5">Contoh data · belum tayang</p>
                        </td>
                        <td class="py-4 px-4 align-top">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#FEF6EE] text-[#B54708]">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#F79009]"></span>
                                Draf
                            </span>
                        </td>
                        <td class="py-4 pl-4 align-top text-center">
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
                        <td class="py-4 pr-4 align-top">
                            <span class="font-bold text-[#1F1F1F] text-xs sm:text-sm">IPDP</span>
                        </td>
                        <td class="py-4 px-4 align-top">
                            <p class="text-xs text-[#707070] leading-relaxed">Perancangan media pembelajaran digital</p>
                            <p class="text-[11px] text-gray-400 mt-0.5">Contoh data · belum tayang</p>
                        </td>
                        <td class="py-4 px-4 align-top">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#FEF6EE] text-[#B54708]">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#F79009]"></span>
                                Draf
                            </span>
                        </td>
                        <td class="py-4 pl-4 align-top text-center">
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

                    <!-- Row 5 -->
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="py-4 pr-4 align-top">
                            <span class="font-bold text-[#1F1F1F] text-xs sm:text-sm">ITDP</span>
                        </td>
                        <td class="py-4 px-4 align-top">
                            <p class="text-xs text-[#707070] leading-relaxed">Pengembangan inovasi teknologi pendidikan</p>
                            <p class="text-[11px] text-gray-400 mt-0.5">Contoh data · belum tayang</p>
                        </td>
                        <td class="py-4 px-4 align-top">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#FEF6EE] text-[#B54708]">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#F79009]"></span>
                                Draf
                            </span>
                        </td>
                        <td class="py-4 pl-4 align-top text-center">
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

                    <!-- Row 6 -->
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="py-4 pr-4 align-top">
                            <span class="font-bold text-[#1F1F1F] text-xs sm:text-sm">Poster Digital</span>
                        </td>
                        <td class="py-4 px-4 align-top">
                            <p class="text-xs text-[#707070] leading-relaxed">Komunikasi visual & portofolio poster</p>
                            <p class="text-[11px] text-gray-400 mt-0.5">Contoh data · belum tayang</p>
                        </td>
                        <td class="py-4 px-4 align-top">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#FEF6EE] text-[#B54708]">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#F79009]"></span>
                                Draf
                            </span>
                        </td>
                        <td class="py-4 pl-4 align-top text-center">
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

                    <!-- Row 7 -->
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="py-4 pr-4 align-top">
                            <span class="font-bold text-[#1F1F1F] text-xs sm:text-sm">MicroTeaching Digital</span>
                        </td>
                        <td class="py-4 px-4 align-top">
                            <p class="text-xs text-[#707070] leading-relaxed">Penyusunan materi & simulasi pengajaran digital</p>
                            <p class="text-[11px] text-gray-400 mt-0.5">Contoh data · belum tayang</p>
                        </td>
                        <td class="py-4 px-4 align-top">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#FEF6EE] text-[#B54708]">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#F79009]"></span>
                                Draf
                            </span>
                        </td>
                        <td class="py-4 pl-4 align-top text-center">
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
            <div>Menampilkan 1-7 dari 7 data</div>
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
