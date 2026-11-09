@extends('layouts.admin')

@section('title', 'Admin KMID - Edit Galeri Aktivitas')
@section('topbar_breadcrumb', 'Admin KMID / Galeri Aktivitas')

@section('content')
<div class="space-y-6 max-w-4xl">
    <!-- Breadcrumb & Page Heading -->
    <div>
        <nav class="flex items-center gap-1.5 text-xs text-[#8E8E93] mb-1.5">
            <span>Admin</span>
            <span>/</span>
            <span>Pengelolaan konten</span>
            <span>/</span>
            <a href="{{ route('admin.galeri-aktivitas') }}" class="hover:underline">Galeri Aktivitas</a>
            <span>/</span>
            <span class="text-[#1F1F1F] font-medium">Edit Galeri Aktivitas</span>
        </nav>
        <h1 class="text-2xl sm:text-3xl font-bold text-[#1F1F1F] tracking-tight">Edit Galeri Aktivitas</h1>
        <p class="text-xs sm:text-sm text-[#707070] mt-1">Perbarui dokumentasi, periksa pratinjau, lalu simpan draf atau publikasikan perubahan.</p>
    </div>

    <!-- Edit Form Card -->
    <div class="bg-white rounded-[24px] sm:rounded-[28px] p-6 sm:p-8 lg:p-10 shadow-[0_10px_35px_rgba(0,0,0,0.03)] border border-gray-100/90">
        <!-- Card Header Info -->
        <div class="mb-8 pb-5 border-b border-gray-100">
            <h2 class="text-lg sm:text-xl font-bold text-[#1F1F1F]">Foto & informasi aktivitas</h2>
            <p class="text-xs text-[#707070] mt-0.5">Contoh formulir edit · kolom bertanda * wajib diisi</p>
        </div>

        <form action="{{ route('admin.galeri-aktivitas') }}" method="GET" class="space-y-6">
            <!-- 1. Foto Aktivitas -->
            <div>
                <label class="block text-xs sm:text-sm font-semibold text-[#1F1F1F] mb-2">
                    Foto aktivitas <span class="text-red-500">*</span>
                </label>

                <!-- Current file preview pill -->
                <div class="flex items-center gap-3 p-3 bg-gray-50/80 border border-gray-200/80 rounded-2xl mb-3">
                    <img src="{{ asset('images/desainKMID/Hi-fi-design/activity_img_0.png') }}" alt="" class="w-16 h-12 rounded-xl object-cover shrink-0 border border-gray-200">
                    <div class="flex-1 min-w-0">
                        <p class="text-xs sm:text-sm font-semibold text-[#1F1F1F] truncate">dokumentasi-klinik-uiux.jpg</p>
                        <p class="text-[11px] text-[#707070] flex items-center gap-1.5 mt-0.5">
                            <span>JPG · 2.4 MB</span>
                            <span>•</span>
                            <span class="text-emerald-600 font-medium flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                </svg>
                                Unggahan berhasil
                            </span>
                        </p>
                    </div>
                </div>

                <!-- Dropzone area -->
                <div class="border-2 border-dashed border-gray-200 hover:border-[#004ADA] rounded-2xl p-6 text-center cursor-pointer transition-colors bg-white hover:bg-blue-50/20 group">
                    <div class="w-10 h-10 rounded-full bg-blue-50 text-[#004ADA] flex items-center justify-center mx-auto mb-2 group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                        </svg>
                    </div>
                    <p class="text-xs text-[#707070]">
                        <span class="font-semibold text-[#004ADA]">Klik untuk unggah</span> atau seret foto ke sini · JPG/PNG, maksimal 5 MB.
                    </p>
                </div>
            </div>

            <!-- 2. Judul Aktivitas -->
            <div>
                <label for="judul" class="block text-xs sm:text-sm font-semibold text-[#1F1F1F] mb-2">
                    Judul aktivitas <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="judul" 
                       name="judul" 
                       value="Hands-on UI/UX Prototyping & Modern Frontend Clinic"
                       class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA] transition-colors">
            </div>

            <!-- 3. Caption / Penjelasan Singkat -->
            <div>
                <label for="caption" class="block text-xs sm:text-sm font-semibold text-[#1F1F1F] mb-2">
                    Caption / penjelasan singkat <span class="text-red-500">*</span>
                </label>
                <textarea id="caption" 
                          name="caption" 
                          rows="4" 
                          class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA] transition-colors leading-relaxed">Sesi mentoring intensif pembedahan desain sistem atomik dan pengenalan API bersama mahasiswa Sekolah Vokasi dan Fasilkom.</textarea>
            </div>

            <!-- 4. Two-Column: Kategori & Tanggal -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                <!-- Kategori -->
                <div>
                    <label for="kategori" class="block text-xs sm:text-sm font-semibold text-[#1F1F1F] mb-2">
                        Kategori <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select id="kategori" name="kategori" class="w-full appearance-none bg-white border border-gray-200 rounded-xl px-4 py-3 pr-10 text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] cursor-pointer">
                            <option value="LAB INOVASI" selected>LAB INOVASI</option>
                            <option value="PODIUM PRESTASI">PODIUM PRESTASI</option>
                            <option value="DESIGN SPRINT">DESIGN SPRINT</option>
                            <option value="DEMO DAY">DEMO DAY</option>
                            <option value="COMMUNITY">COMMUNITY</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3.5 text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Tanggal Aktivitas -->
                <div>
                    <label for="tanggal" class="block text-xs sm:text-sm font-semibold text-[#1F1F1F] mb-2">
                        Tanggal aktivitas <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="tanggal" 
                           name="tanggal" 
                           value="12 April 2025"
                           class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA] transition-colors">
                </div>
            </div>

            <!-- 5. Lokasi -->
            <div>
                <label for="lokasi" class="block text-xs sm:text-sm font-semibold text-[#1F1F1F] mb-2">
                    Lokasi <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="lokasi" 
                       name="lokasi" 
                       value="Laboratorium Terpadu Gedung Tahir UGM"
                       class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA] transition-colors">
            </div>

            <!-- 6. Teks Alternatif Foto -->
            <div>
                <label for="alt_text" class="block text-xs sm:text-sm font-semibold text-[#1F1F1F] mb-2">
                    Teks alternatif foto
                </label>
                <input type="text" 
                       id="alt_text" 
                       name="alt_text" 
                       value="Dokumentasi bersama mahasiswa dan delegasi KMID UGM."
                       class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA] transition-colors">
                <p class="text-[11px] text-[#8E8E93] mt-2">
                    Contoh data: nama berkas, tanggal, ukuran, dan teks alternatif untuk simulasi unggahan.
                </p>
            </div>

            <!-- Action Buttons Footer -->
            <div class="pt-6 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-3">
                <a href="{{ route('admin.galeri-aktivitas') }}" class="w-full sm:w-auto px-5 py-2.5 rounded-xl border border-gray-200 text-xs sm:text-sm font-medium text-[#707070] hover:text-[#1F1F1F] hover:bg-gray-50 transition-colors text-center">
                    Batal
                </a>

                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <button type="submit" class="flex-1 sm:flex-none px-5 py-2.5 rounded-xl border border-gray-200 text-xs sm:text-sm font-medium text-[#1F1F1F] bg-white hover:bg-gray-50 transition-colors">
                        Simpan Draf
                    </button>
                    <button type="submit" class="flex-1 sm:flex-none px-6 py-2.5 rounded-xl bg-[#004ADA] hover:bg-[#003bb0] text-xs sm:text-sm font-medium text-white shadow-[0_4px_14px_rgba(0,74,218,0.25)] transition-all">
                        Publikasikan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
