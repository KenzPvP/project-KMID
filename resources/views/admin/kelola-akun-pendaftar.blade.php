@php
    $isStaff = request()->is('staff*');
    $routePrefix = $isStaff ? 'staff.pendaftar.' : 'admin.pendaftar.';
    $portalLabel = $isStaff ? 'Staff KMID' : 'Admin KMID';
    $roleName = $isStaff ? 'Staff Managerial' : 'Administrator';
    $currentStatus = request('status', 'Semua');
@endphp

@extends('layouts.admin')

@section('title', $portalLabel . ' - Kelola Akun Pendaftar')
@section('topbar_breadcrumb', $portalLabel . ' / Kelola Akun Pendaftar')
@section('profile_role', $roleName)

@section('footer_left', 'KMID UGM · Pengelolaan pendaftaran')
@section('footer_right', 'Data pendaftar')

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

    <!-- Summary Metric Cards (5 Cards) -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3 sm:gap-4">
        <!-- Card 1: Mendaftar -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 shadow-[0_4px_20px_rgba(0,0,0,0.02)] border border-gray-100 flex flex-col justify-between relative overflow-hidden">
            <div>
                <p class="text-xs text-[#707070] font-medium">Mendaftar</p>
                <div class="flex items-baseline gap-1.5 mt-2">
                    <span class="text-2xl sm:text-3xl font-bold text-[#1F1F1F]">{{ $metrics['mendaftar'] ?? 0 }}</span>
                    <span class="text-xs text-[#707070]">pendaftar</span>
                </div>
            </div>
            <div class="w-full h-1 bg-[#1F1F1F] rounded-full mt-4"></div>
        </div>

        <!-- Card 2: Lolos Berkas -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 shadow-[0_4px_20px_rgba(0,0,0,0.02)] border border-gray-100 flex flex-col justify-between relative overflow-hidden">
            <div>
                <p class="text-xs text-[#707070] font-medium">Lolos Berkas</p>
                <div class="flex items-baseline gap-1.5 mt-2">
                    <span class="text-2xl sm:text-3xl font-bold text-[#1F1F1F]">{{ $metrics['lolos_berkas'] ?? 0 }}</span>
                    <span class="text-xs text-[#707070]">pendaftar</span>
                </div>
            </div>
            <div class="w-full h-1 bg-[#FEA515] rounded-full mt-4"></div>
        </div>

        <!-- Card 3: Lolos Wawancara -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 shadow-[0_4px_20px_rgba(0,0,0,0.02)] border border-gray-100 flex flex-col justify-between relative overflow-hidden">
            <div>
                <p class="text-xs text-[#707070] font-medium">Lolos Wawancara</p>
                <div class="flex items-baseline gap-1.5 mt-2">
                    <span class="text-2xl sm:text-3xl font-bold text-[#1F1F1F]">{{ $metrics['lolos_wawancara'] ?? 0 }}</span>
                    <span class="text-xs text-[#707070]">pendaftar</span>
                </div>
            </div>
            <div class="w-full h-1 bg-[#004ADA] rounded-full mt-4"></div>
        </div>

        <!-- Card 4: Tidak Lolos -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 shadow-[0_4px_20px_rgba(0,0,0,0.02)] border border-gray-100 flex flex-col justify-between relative overflow-hidden">
            <div>
                <p class="text-xs text-[#707070] font-medium">Tidak Lolos</p>
                <div class="flex items-baseline gap-1.5 mt-2">
                    <span class="text-2xl sm:text-3xl font-bold text-[#1F1F1F]">{{ $metrics['tidak_lolos'] ?? 0 }}</span>
                    <span class="text-xs text-[#707070]">pendaftar</span>
                </div>
            </div>
            <div class="w-full h-1 bg-[#D92D20] rounded-full mt-4"></div>
        </div>

        <!-- Card 5: Diterima -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 shadow-[0_4px_20px_rgba(0,0,0,0.02)] border border-gray-100 flex flex-col justify-between relative overflow-hidden col-span-2 sm:col-span-1">
            <div>
                <p class="text-xs text-[#707070] font-medium">Diterima</p>
                <div class="flex items-baseline gap-1.5 mt-2">
                    <span class="text-2xl sm:text-3xl font-bold text-[#1F1F1F]">{{ $metrics['diterima'] ?? 0 }}</span>
                    <span class="text-xs text-[#707070]">pendaftar</span>
                </div>
            </div>
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
                <span class="text-xs sm:text-sm text-[#707070]">{{ count($pendaftars) }} pendaftar</span>
                <a href="{{ route($routePrefix . 'create') }}" class="inline-flex items-center justify-center bg-[#004ADA] hover:bg-[#003bb0] text-white font-medium text-xs sm:text-sm px-4 py-2 rounded-xl shadow-[0_4px_14px_rgba(0,74,218,0.25)] transition-all duration-200">
                    + Tambah Pendaftar
                </a>
            </div>
        </div>

        <!-- Search Bar & Export Button Row -->
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3 mb-4">
            <!-- Search Form -->
            <form method="GET" action="{{ route($routePrefix . 'index') }}" class="relative flex-1 max-w-md">
                @if(request('status') && request('status') !== 'Semua')
                    <input type="hidden" name="status" value="{{ request('status') }}">
                @endif
                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </span>
                <input type="text" 
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Cari nama atau NIM pendaftar..." 
                       class="w-full pl-10 pr-4 py-2 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] placeholder:text-[#9CA3AF] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA] transition-colors">
            </form>

            <!-- Ekspor Button -->
            <div>
                <button type="button" onclick="window.print()" class="inline-flex items-center gap-1.5 px-3 py-2 bg-white border border-gray-200 rounded-xl text-xs font-medium text-[#707070] hover:text-[#1F1F1F] hover:bg-gray-50 transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                    Cetak / Ekspor
                </button>
            </div>
        </div>

        <!-- Status Filter Tabs (Pill Buttons) -->
        <div class="flex items-center gap-2 overflow-x-auto pb-2 mb-5">
            <a href="{{ route($routePrefix . 'index', array_filter(['search' => request('search')])) }}" 
               class="px-4 py-1.5 rounded-xl text-xs font-medium transition-colors shrink-0 {{ $currentStatus === 'Semua' ? 'bg-[#004ADA] text-white font-semibold shadow-xs' : 'bg-white border border-gray-200 text-[#707070] hover:text-[#1F1F1F] hover:bg-gray-50' }}">
                Semua
            </a>
            <a href="{{ route($routePrefix . 'index', array_filter(['status' => 'Mendaftar', 'search' => request('search')])) }}" 
               class="px-4 py-1.5 rounded-xl text-xs font-medium transition-colors shrink-0 {{ $currentStatus === 'Mendaftar' ? 'bg-[#004ADA] text-white font-semibold shadow-xs' : 'bg-white border border-gray-200 text-[#707070] hover:text-[#1F1F1F] hover:bg-gray-50' }}">
                Mendaftar
            </a>
            <a href="{{ route($routePrefix . 'index', array_filter(['status' => 'Lolos Berkas', 'search' => request('search')])) }}" 
               class="px-4 py-1.5 rounded-xl text-xs font-medium transition-colors shrink-0 {{ $currentStatus === 'Lolos Berkas' ? 'bg-[#004ADA] text-white font-semibold shadow-xs' : 'bg-white border border-gray-200 text-[#707070] hover:text-[#1F1F1F] hover:bg-gray-50' }}">
                Lolos Berkas
            </a>
            <a href="{{ route($routePrefix . 'index', array_filter(['status' => 'Lolos Wawancara', 'search' => request('search')])) }}" 
               class="px-4 py-1.5 rounded-xl text-xs font-medium transition-colors shrink-0 {{ $currentStatus === 'Lolos Wawancara' ? 'bg-[#004ADA] text-white font-semibold shadow-xs' : 'bg-white border border-gray-200 text-[#707070] hover:text-[#1F1F1F] hover:bg-gray-50' }}">
                Lolos Wawancara
            </a>
            <a href="{{ route($routePrefix . 'index', array_filter(['status' => 'Tidak Lolos', 'search' => request('search')])) }}" 
               class="px-4 py-1.5 rounded-xl text-xs font-medium transition-colors shrink-0 {{ $currentStatus === 'Tidak Lolos' ? 'bg-[#004ADA] text-white font-semibold shadow-xs' : 'bg-white border border-gray-200 text-[#707070] hover:text-[#1F1F1F] hover:bg-gray-50' }}">
                Tidak Lolos
            </a>
            <a href="{{ route($routePrefix . 'index', array_filter(['status' => 'Diterima', 'search' => request('search')])) }}" 
               class="px-4 py-1.5 rounded-xl text-xs font-medium transition-colors shrink-0 {{ $currentStatus === 'Diterima' ? 'bg-[#004ADA] text-white font-semibold shadow-xs' : 'bg-white border border-gray-200 text-[#707070] hover:text-[#1F1F1F] hover:bg-gray-50' }}">
                Diterima
            </a>
        </div>

        <!-- Table Responsive Container -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[950px]">
                <thead>
                    <tr class="bg-gray-50/70 border-b border-gray-200/80 text-[11px] font-semibold text-[#707070]">
                        <th class="py-3 px-3">Nama lengkap</th>
                        <th class="py-3 px-3">NIM</th>
                        <th class="py-3 px-3">Program studi</th>
                        <th class="py-3 px-3">Divisi pilihan</th>
                        <th class="py-3 px-3">Status</th>
                        <th class="py-3 px-3">Tanggal wawancara</th>
                        <th class="py-3 px-3">Jam wawancara</th>
                        <th class="py-3 px-3 text-center">Aksi</th>
                        <th class="py-3 pr-3 w-6"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-xs">
                    @forelse($pendaftars as $pendaftar)
                        <tr class="hover:bg-slate-50/60 transition-colors">
                            <td class="py-3.5 px-3 font-semibold text-[#1F1F1F]">{{ $pendaftar->name }}</td>
                            <td class="py-3.5 px-3 text-[#707070]">{{ $pendaftar->nim }}</td>
                            <td class="py-3.5 px-3 text-[#707070]">{{ $pendaftar->major }}</td>
                            <td class="py-3.5 px-3 text-[#1F1F1F]">{{ $pendaftar->division }}</td>
                            <td class="py-3.5 px-3">
                                @if($pendaftar->status === 'Diterima')
                                    <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#EAF8F0] text-[#1E8E3E]">
                                        Diterima
                                    </span>
                                @elseif($pendaftar->status === 'Lolos Wawancara')
                                    <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#EBF2FE] text-[#004ADA]">
                                        Lolos Wawancara
                                    </span>
                                @elseif($pendaftar->status === 'Lolos Berkas')
                                    <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#FEF6EE] text-[#B54708]">
                                        Lolos Berkas
                                    </span>
                                @elseif($pendaftar->status === 'Tidak Lolos')
                                    <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#FEE4E2] text-[#D92D20]">
                                        Tidak Lolos
                                    </span>
                                @else
                                    <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-gray-100 text-gray-700">
                                        {{ $pendaftar->status ?? 'Mendaftar' }}
                                    </span>
                                @endif
                            </td>
                            <td class="py-3.5 px-3 text-[#1F1F1F]">{{ $pendaftar->interview_date ?? '—' }}</td>
                            <td class="py-3.5 px-3 text-[#707070]">{{ $pendaftar->interview_time ?? '—' }}</td>
                            <td class="py-3.5 px-3 text-center">
                                <div class="flex flex-col items-center gap-1.5">
                                    <a href="{{ route($routePrefix . 'detail', ['id' => $pendaftar->id]) }}" class="text-xs font-semibold text-[#004ADA] hover:underline">
                                        Detail
                                    </a>
                                    <div class="flex items-center gap-1.5">
                                        @if($pendaftar->status === 'Mendaftar')
                                            <button type="button" onclick="openLoloskanModal('{{ addslashes($pendaftar->name) }}', '{{ $pendaftar->id }}')" class="bg-[#004ADA] hover:bg-[#003bb0] text-white px-2.5 py-0.5 rounded-md text-[11px] font-medium transition-colors cursor-pointer">
                                                Loloskan Berkas
                                            </button>
                                            <button type="button" onclick="openTolakModal('{{ addslashes($pendaftar->name) }}', 'Mendaftar', '{{ $pendaftar->id }}')" class="border border-red-300 text-red-600 hover:bg-red-50 px-2.5 py-0.5 rounded-md text-[11px] font-medium transition-colors cursor-pointer">
                                                Tolak
                                            </button>
                                        @elseif($pendaftar->status === 'Lolos Berkas')
                                            <a href="{{ route($routePrefix . 'wawancara') }}" class="text-xs font-semibold text-[#004ADA] hover:underline">
                                                Jadwalkan Wawancara
                                            </a>
                                        @elseif($pendaftar->status === 'Lolos Wawancara')
                                            <button type="button" onclick="openTerimaModal('{{ addslashes($pendaftar->name) }}', 'Lolos Wawancara', 'Diterima', '{{ $pendaftar->id }}')" class="bg-[#004ADA] hover:bg-[#003bb0] text-white px-2.5 py-0.5 rounded-md text-[11px] font-medium transition-colors cursor-pointer">
                                                Terima
                                            </button>
                                            <button type="button" onclick="openTolakModal('{{ addslashes($pendaftar->name) }}', 'Lolos Wawancara', '{{ $pendaftar->id }}')" class="border border-red-300 text-red-600 hover:bg-red-50 px-2.5 py-0.5 rounded-md text-[11px] font-medium transition-colors cursor-pointer">
                                                Tolak
                                            </button>
                                        @elseif($pendaftar->status === 'Diterima')
                                            <span class="text-xs font-semibold text-[#1E8E3E]">Diterima</span>
                                        @else
                                            <span class="text-xs font-semibold text-[#D92D20]">Tidak lolos</span>
                                        @endif
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
                    @empty
                        <tr>
                            <td colspan="9" class="py-12 text-center text-xs text-[#8E8E93]">
                                Belum ada data pendaftar yang sesuai.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination & Counter Footer -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-3 pt-6 mt-4 border-t border-gray-100 text-xs text-[#707070]">
            <div>Menampilkan 1-{{ count($pendaftars) }} dari {{ count($pendaftars) }} pendaftar</div>
            <div class="flex items-center gap-3">
                <span>{{ count($pendaftars) }} total</span>
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
            Pendaftar akan dipindahkan dari Lolos Wawancara ke Diterima sebagai anggota KMID.
        </p>
        <form id="form-terima" method="POST" action="">
            @csrf
            <input type="hidden" name="status" value="Diterima">
            <div class="flex items-center justify-end gap-3 pt-3 border-t border-gray-100">
                <button type="button" onclick="closeTerimaModal()" class="px-4 py-2 border border-gray-200 rounded-xl text-xs font-medium text-[#707070] hover:text-[#1F1F1F] hover:bg-gray-50 transition-colors">
                    Batal
                </button>
                <button type="submit" class="px-5 py-2 bg-[#004ADA] hover:bg-[#003bb0] text-white rounded-xl text-xs font-semibold shadow-xs transition-colors">
                    Terima
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ============================================================== -->
<!-- MODAL: TOLAK PENDAFTAR                                         -->
<!-- ============================================================== -->
<div id="modal-tolak" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/40 hidden">
    <div class="bg-white rounded-[24px] max-w-md w-full p-6 shadow-2xl border border-gray-100">
        <h3 class="text-lg font-bold text-[#1F1F1F] mb-2">Tolak pendaftar?</h3>
        <p id="modal-tolak-desc" class="text-xs text-[#707070] leading-relaxed mb-6">
            Pendaftar akan dipindahkan ke Tidak Lolos. Pastikan hasil pemeriksaan berkas sudah sesuai.
        </p>
        <form id="form-tolak" method="POST" action="">
            @csrf
            <input type="hidden" name="status" value="Tidak Lolos">
            <div class="flex items-center justify-end gap-3 pt-3 border-t border-gray-100">
                <button type="button" onclick="closeTolakModal()" class="px-4 py-2 border border-gray-200 rounded-xl text-xs font-medium text-[#707070] hover:text-[#1F1F1F] hover:bg-gray-50 transition-colors">
                    Batal
                </button>
                <button type="submit" class="px-5 py-2 bg-[#D92D20] hover:bg-red-700 text-white rounded-xl text-xs font-semibold shadow-xs transition-colors">
                    Tolak
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ============================================================== -->
<!-- MODAL: LOLOSKAN BERKAS                                         -->
<!-- ============================================================== -->
<div id="modal-loloskan" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/40 hidden">
    <div class="bg-white rounded-[24px] max-w-md w-full p-6 shadow-2xl border border-gray-100">
        <h3 class="text-lg font-bold text-[#1F1F1F] mb-2">Loloskan berkas pendaftar?</h3>
        <p id="modal-loloskan-desc" class="text-xs text-[#707070] leading-relaxed mb-6">
            Pendaftar akan dipindahkan dari Mendaftar ke Lolos Berkas. Pendaftar kemudian dapat dijadwalkan untuk wawancara.
        </p>
        <form id="form-loloskan" method="POST" action="">
            @csrf
            <input type="hidden" name="status" value="Lolos Berkas">
            <div class="flex items-center justify-end gap-3 pt-3 border-t border-gray-100">
                <button type="button" onclick="closeLoloskanModal()" class="px-4 py-2 border border-gray-200 rounded-xl text-xs font-medium text-[#707070] hover:text-[#1F1F1F] hover:bg-gray-50 transition-colors">
                    Batal
                </button>
                <button type="submit" class="px-5 py-2 bg-[#004ADA] hover:bg-[#003bb0] text-white rounded-xl text-xs font-semibold shadow-xs transition-colors">
                    Loloskan Berkas
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const statusUrlBase = "{{ url(($isStaff ? 'staff' : 'admin') . '/kelola-akun') }}";

    function openTerimaModal(nama, dari, ke, id) {
        document.getElementById('modal-terima-desc').textContent = `${nama} akan dipindahkan dari ${dari} ke ${ke} sebagai anggota KMID.`;
        document.getElementById('form-terima').action = `${statusUrlBase}/${id}/status`;
        document.getElementById('modal-terima').classList.remove('hidden');
    }
    function closeTerimaModal() {
        document.getElementById('modal-terima').classList.add('hidden');
    }

    function openTolakModal(nama, dari, id) {
        document.getElementById('modal-tolak-desc').textContent = `${nama} akan dipindahkan dari ${dari} ke Tidak Lolos. Pastikan hasil pemeriksaan sudah sesuai.`;
        document.getElementById('form-tolak').action = `${statusUrlBase}/${id}/status`;
        document.getElementById('modal-tolak').classList.remove('hidden');
    }
    function closeTolakModal() {
        document.getElementById('modal-tolak').classList.add('hidden');
    }

    function openLoloskanModal(nama, id) {
        document.getElementById('modal-loloskan-desc').textContent = `${nama} akan dipindahkan dari Mendaftar ke Lolos Berkas. Pendaftar kemudian dapat dijadwalkan untuk wawancara.`;
        document.getElementById('form-loloskan').action = `${statusUrlBase}/${id}/status`;
        document.getElementById('modal-loloskan').classList.remove('hidden');
    }
    function closeLoloskanModal() {
        document.getElementById('modal-loloskan').classList.add('hidden');
    }
</script>
@endsection
