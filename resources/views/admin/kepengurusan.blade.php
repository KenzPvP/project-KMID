@extends('layouts.admin')
@section('show_content_management', true)

@section('title', 'Admin KMID - Kepengurusan')
@section('topbar_breadcrumb', 'Admin KMID / Kepengurusan')

@section('footer_left', 'KMID UGM · Pengelolaan konten')
@section('footer_right', 'Data kepengurusan')

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
            <a href="{{ route('admin.kepengurusan.create') }}" class="inline-flex items-center justify-center bg-[#004ADA] hover:bg-[#003bb0] text-white font-medium text-xs sm:text-sm px-5 py-2.5 rounded-xl shadow-[0_4px_14px_rgba(0,74,218,0.25)] transition-all duration-200">
                + Tambah Pengurus
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-2xl text-xs sm:text-sm flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
            <button type="button" onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-800 text-sm font-bold ml-4">
                &times;
            </button>
        </div>
    @endif

    <!-- Main Table Card -->
    <div class="bg-white rounded-[24px] sm:rounded-[28px] p-6 sm:p-8 lg:p-10 shadow-[0_10px_35px_rgba(0,0,0,0.03)] border border-gray-100/90">
        <!-- Card Header Info -->
        <div class="mb-6">
            <h2 class="text-lg sm:text-xl font-bold text-[#1F1F1F]">Daftar kepengurusan</h2>
            <p class="text-xs text-[#707070] mt-0.5">
                {{ $stats['total'] ?? count($pengurusList) }} data pengurus · {{ $stats['published'] ?? 0 }} dipublikasikan · {{ $stats['draft'] ?? 0 }} draf
            </p>
        </div>

        <!-- Filter & Search Controls -->
        <form method="GET" action="{{ route('admin.kepengurusan') }}" class="flex flex-col md:flex-row items-stretch md:items-center gap-3 sm:gap-4 mb-6">
            <!-- Search Input -->
            <div class="relative flex-1 max-w-lg">
                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </span>
                <input type="text" 
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Cari nama atau jabatan pengurus..." 
                       class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] placeholder:text-[#9CA3AF] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA] transition-colors">
            </div>

            <!-- Kelompok Dropdown -->
            <div class="relative min-w-[170px]">
                <select name="group" 
                        onchange="this.form.submit()"
                        class="w-full appearance-none bg-white border border-gray-200 rounded-xl px-4 py-2.5 pr-8 text-xs sm:text-sm text-[#707070] focus:outline-none focus:border-[#004ADA] cursor-pointer">
                    <option value="Semua kelompok" {{ request('group') === 'Semua kelompok' || !request('group') ? 'selected' : '' }}>Semua kelompok</option>
                    <option value="Pembina Komunitas" {{ request('group') === 'Pembina Komunitas' ? 'selected' : '' }}>Pembina Komunitas</option>
                    <option value="Badan Pengurus Harian (BPH)" {{ request('group') === 'Badan Pengurus Harian (BPH)' ? 'selected' : '' }}>Badan Pengurus Harian (BPH)</option>
                    <option value="Koordinator Divisi" {{ request('group') === 'Koordinator Divisi' ? 'selected' : '' }}>Koordinator Divisi</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
            </div>

            <!-- Periode Filter -->
            <div class="relative min-w-[170px]">
                <select name="period" 
                        onchange="this.form.submit()"
                        class="w-full appearance-none bg-white border border-gray-200 rounded-xl px-4 py-2.5 pr-8 text-xs sm:text-sm text-[#707070] focus:outline-none focus:border-[#004ADA] cursor-pointer">
                    <option value="Semua periode" {{ request('period') === 'Semua periode' ? 'selected' : '' }}>Semua periode</option>
                    <option value="Periode 2025/2026" {{ request('period', 'Periode 2025/2026') === 'Periode 2025/2026' ? 'selected' : '' }}>Periode 2025/2026</option>
                    <option value="Periode 2024/2025" {{ request('period') === 'Periode 2024/2025' ? 'selected' : '' }}>Periode 2024/2025</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
            </div>
        </form>

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
                    @forelse($pengurusList as $pengurus)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="py-5 pr-4 align-top">
                                <div class="flex flex-col items-center w-16">
                                    <div class="w-14 h-14 rounded-2xl bg-slate-50 border border-gray-200/80 flex items-center justify-center p-1.5 shadow-2xs overflow-hidden">
                                        @if($pengurus->photo_url && file_exists(public_path($pengurus->photo_url)))
                                            <img src="{{ asset($pengurus->photo_url) }}" alt="{{ $pengurus->name }}" class="w-full h-full object-cover rounded-xl">
                                        @else
                                            <img src="{{ asset('images/desainKMID/Hi-fi-design/Frame 1686560879.svg') }}" alt="KMID" class="w-8 h-8 object-contain">
                                        @endif
                                    </div>
                                    <span class="text-[11px] font-medium text-gray-400 mt-1.5">
                                        Urutan {{ sprintf('%02d', $pengurus->order) }}
                                    </span>
                                </div>
                            </td>
                            <td class="py-5 px-4 align-top">
                                <div>
                                    <h3 class="font-bold text-[#1F1F1F] text-xs sm:text-sm leading-snug">{{ $pengurus->name }}</h3>
                                    <p class="text-xs text-[#707070] mt-0.5">{{ $pengurus->department ?? 'Departemen belum diisi' }}</p>
                                    <span class="inline-block mt-1.5 px-2 py-0.5 rounded text-[11px] font-semibold bg-[#EBF2FE] text-[#004ADA]">
                                        {{ $pengurus->group }}
                                    </span>
                                </div>
                            </td>
                            <td class="py-5 px-4 align-top">
                                <p class="font-semibold text-[#1F1F1F] text-xs">{{ $pengurus->position }}</p>
                                <p class="text-xs text-[#707070] mt-0.5">{{ $pengurus->email ? $pengurus->email : 'Email belum diisi' }}</p>
                            </td>
                            <td class="py-5 px-4 align-top">
                                @if($pengurus->status === 'Dipublikasikan')
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#EAF8F0] text-[#1E8E3E]">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#1E8E3E]"></span>
                                        Dipublikasikan
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#FEF6EE] text-[#B54708]">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#F79009]"></span>
                                        Draf
                                    </span>
                                @endif
                                <p class="text-[11px] text-[#707070] mt-1">{{ $pengurus->period }}</p>
                            </td>
                            <td class="py-5 pl-4 align-top text-center">
                                <div class="flex flex-col items-center gap-2">
                                    <form method="POST" action="{{ route('admin.kepengurusan.destroy', $pengurus) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pengurus ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs font-medium text-rose-500 hover:text-rose-700 transition-colors cursor-pointer">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-xs text-[#8E8E93]">
                                Belum ada data pengurus yang sesuai filter atau pencarian.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination & Counter Footer -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-3 pt-6 mt-2 border-t border-gray-100 text-xs text-[#707070]">
            <div>Menampilkan 1-{{ count($pengurusList) }} dari {{ count($pengurusList) }} data</div>
            <div class="flex items-center gap-2">
                <span>Total: <strong>{{ count($pengurusList) }}</strong> pengurus</span>
            </div>
        </div>
    </div>
</div>
@endsection
