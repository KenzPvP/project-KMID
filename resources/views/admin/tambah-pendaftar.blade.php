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
@section('footer_right', 'Data pendaftar')

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

    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-2xl text-xs sm:text-sm flex items-start gap-2.5">
            <svg class="w-5 h-5 text-red-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <div>
                <p class="font-semibold">Mohon periksa formulir berikut:</p>
                <ul class="list-disc list-inside mt-1 space-y-0.5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

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

        <form action="{{ route($routePrefix . 'store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- 2-Column Fields Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-5 gap-x-8 text-xs sm:text-sm">
                <!-- Col 1: Nama Lengkap -->
                <div>
                    <label for="name" class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Nama lengkap <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Contoh: Rania Safira" required class="w-full px-4 py-2.5 bg-white border @error('name') border-red-400 @else border-gray-200 @enderror rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA]">
                    @error('name')
                        <p class="text-[11px] text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Col 2: NIM -->
                <div>
                    <label for="nim" class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        NIM <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="nim" name="nim" value="{{ old('nim') }}" placeholder="Format: 25/512345/SV/22345" required class="w-full px-4 py-2.5 bg-white border @error('nim') border-red-400 @else border-gray-200 @enderror rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA]">
                    <p class="text-[11px] text-[#8E8E93] mt-1">Format: 25/512345/SV/22345. NIM harus unik.</p>
                    @error('nim')
                        <p class="text-[11px] text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Col 1: Program Studi -->
                <div>
                    <label for="major" class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Program studi <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="major" name="major" value="{{ old('major') }}" placeholder="Contoh: Teknologi Rekayasa Perangkat Lunak" required class="w-full px-4 py-2.5 bg-white border @error('major') border-red-400 @else border-gray-200 @enderror rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA]">
                    @error('major')
                        <p class="text-[11px] text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Col 2: Email UGM -->
                <div>
                    <label for="email" class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Email UGM <span class="text-red-500">*</span>
                    </label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="nama@mail.ugm.ac.id" required class="w-full px-4 py-2.5 bg-white border @error('email') border-red-400 @else border-gray-200 @enderror rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA]">
                    <p class="text-[11px] text-[#8E8E93] mt-1">Gunakan email UGM dengan domain @mail.ugm.ac.id</p>
                    @error('email')
                        <p class="text-[11px] text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Col 1: No. WhatsApp -->
                <div>
                    <label for="phone_number" class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        No. WhatsApp
                    </label>
                    <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" placeholder="Contoh: 0813-9876-5432" class="w-full px-4 py-2.5 bg-white border @error('phone_number') border-red-400 @else border-gray-200 @enderror rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA]">
                    @error('phone_number')
                        <p class="text-[11px] text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Col 2: Divisi Pilihan -->
                <div>
                    <label for="division" class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Divisi pilihan <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select id="division" name="division" required class="w-full appearance-none bg-white border @error('division') border-red-400 @else border-gray-200 @enderror rounded-xl px-4 py-2.5 pr-8 text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] cursor-pointer">
                            <option value="">Pilih Divisi...</option>
                            <option value="Teknologi" {{ old('division', 'Teknologi') === 'Teknologi' ? 'selected' : '' }}>Teknologi</option>
                            <option value="Media Kreatif" {{ old('division') === 'Media Kreatif' ? 'selected' : '' }}>Media Kreatif</option>
                            <option value="Humas" {{ old('division') === 'Humas' ? 'selected' : '' }}>Humas</option>
                            <option value="Riset & Inovasi" {{ old('division') === 'Riset & Inovasi' ? 'selected' : '' }}>Riset & Inovasi</option>
                            <option value="Perlombaan" {{ old('division') === 'Perlombaan' ? 'selected' : '' }}>Perlombaan</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                    @error('division')
                        <p class="text-[11px] text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Col 1: Link CV/Berkas -->
                <div>
                    <label for="cv_url" class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Link CV/berkas
                    </label>
                    <input type="url" id="cv_url" name="cv_url" value="{{ old('cv_url') }}" placeholder="https://example.com/cv/nama-berkas.pdf" class="w-full px-4 py-2.5 bg-white border @error('cv_url') border-red-400 @else border-gray-200 @enderror rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA]">
                    @error('cv_url')
                        <p class="text-[11px] text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Col 2: Status Awal -->
                <div>
                    <label for="status" class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Status awal
                    </label>
                    <input type="text" id="status" name="status" value="Mendaftar" readonly class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-xs sm:text-sm text-[#707070] cursor-not-allowed">
                    <p class="text-[11px] text-[#8E8E93] mt-1">Status default untuk pendaftar baru.</p>
                </div>

                <!-- Col 1: Peran Akun Login -->
                <div>
                    <label for="role" class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Peran akun login <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select id="role" name="role" required class="w-full appearance-none bg-white border @error('role') border-red-400 @else border-gray-200 @enderror rounded-xl px-4 py-2.5 pr-8 text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] cursor-pointer">
                            <option value="pendaftar" {{ old('role', request('role', 'pendaftar')) === 'pendaftar' ? 'selected' : '' }}>Pendaftar (Oprec KMID)</option>
                            <option value="staff" {{ old('role', request('role', 'pendaftar')) === 'staff' ? 'selected' : '' }}>Staff (Akses Dashboard Pengelolaan)</option>
                            @if(auth()->check() && auth()->user()->role === 'admin')
                                <option value="admin" {{ old('role', request('role', 'pendaftar')) === 'admin' ? 'selected' : '' }}>Administrator (Akses Penuh Seluruh Sistem)</option>
                            @endif
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-[11px] text-[#8E8E93] mt-1">Pilih "Staff" agar saat akun login langsung diarahkan ke <strong>Dashboard Staff</strong>.</p>
                    @error('role')
                        <p class="text-[11px] text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Col 2: Kata Sandi Login -->
                <div>
                    <label for="password" class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Kata sandi login (Password)
                    </label>
                    <input type="text" id="password" name="password" value="{{ old('password') }}" placeholder="Default: password123 (min. 8 karakter)" class="w-full px-4 py-2.5 bg-white border @error('password') border-red-400 @else border-gray-200 @enderror rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA]">
                    <p class="text-[11px] text-[#8E8E93] mt-1">Kosongkan jika ingin memakai sandi default: <span class="font-mono text-gray-700 bg-gray-100 px-1 py-0.5 rounded">password123</span></p>
                    @error('password')
                        <p class="text-[11px] text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Full-width Textarea: Motivasi Singkat -->
            <div>
                <label for="motivation" class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                    Motivasi singkat
                </label>
                <textarea id="motivation" name="motivation" rows="4" placeholder="Tuliskan motivasi pendaftar..." class="w-full px-4 py-3 bg-white border @error('motivation') border-red-400 @else border-gray-200 @enderror rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA] leading-relaxed">{{ old('motivation') }}</textarea>
                @error('motivation')
                    <p class="text-[11px] text-red-500 mt-1">{{ $message }}</p>
                @enderror
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
