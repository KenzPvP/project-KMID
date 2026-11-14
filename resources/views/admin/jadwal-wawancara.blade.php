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
@section('footer_right', 'Sistem Jadwal Otomatis')

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

    @if(session('success'))
        <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl flex items-center justify-between text-xs sm:text-sm">
            <div class="flex items-center gap-2.5">
                <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span class="font-semibold">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <!-- Main Card -->
    <div class="bg-white rounded-[24px] sm:rounded-[28px] p-6 sm:p-8 lg:p-10 shadow-[0_10px_35px_rgba(0,0,0,0.03)] border border-gray-100/90">
        <!-- Card Header: Title & Action Button -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-[#1F1F1F]">Jadwal wawancara</h2>
                <p class="text-xs text-[#707070] mt-0.5">{{ $totalSlots }} slot · {{ $availableSlots }} tersedia · {{ $filledSlots }} terisi</p>
            </div>
            <div>
                <a href="{{ route($routePrefix . 'tambah-jadwal') }}" class="inline-flex items-center justify-center gap-1.5 bg-[#004ADA] hover:bg-[#003bb0] text-white font-medium text-xs sm:text-sm px-4 py-2.5 rounded-xl shadow-[0_4px_14px_rgba(0,74,218,0.25)] transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    <span>+ Tambah Jadwal</span>
                </a>
            </div>
        </div>

        <!-- Filter Controls & View Switcher Row -->
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-6">
            <!-- Dropdown Filters (Tanggal, Pewawancara, Status Slot) -->
            <form action="{{ route($routePrefix . 'wawancara') }}" method="GET" class="flex flex-wrap items-center gap-3">
                <!-- Filter Tanggal -->
                <div class="relative min-w-[150px]">
                    <label class="block text-[11px] text-[#707070] mb-1 font-medium">Tanggal</label>
                    <div class="relative">
                        <select name="tanggal" onchange="this.form.submit()" class="w-full appearance-none bg-white border border-gray-200 rounded-xl px-3 py-2 pr-8 text-xs text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] cursor-pointer">
                            <option value="Semua tanggal" {{ request('tanggal') == 'Semua tanggal' ? 'selected' : '' }}>Semua tanggal</option>
                            @foreach($availableDates as $date)
                                <option value="{{ $date->format('Y-m-d') }}" {{ request('tanggal') == $date->format('Y-m-d') ? 'selected' : '' }}>
                                    {{ \Carbon\Carbon::parse($date)->locale('id')->isoFormat('D MMMM Y') }}
                                </option>
                            @endforeach
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
                        <select name="pewawancara" onchange="this.form.submit()" class="w-full appearance-none bg-white border border-gray-200 rounded-xl px-3 py-2 pr-8 text-xs text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] cursor-pointer">
                            <option value="Semua pewawancara" {{ request('pewawancara') == 'Semua pewawancara' ? 'selected' : '' }}>Semua pewawancara</option>
                            @foreach($availableInterviewers as $interviewer)
                                <option value="{{ $interviewer }}" {{ request('pewawancara') == $interviewer ? 'selected' : '' }}>
                                    {{ $interviewer }}
                                </option>
                            @endforeach
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
                        <select name="status" onchange="this.form.submit()" class="w-full appearance-none bg-white border border-gray-200 rounded-xl px-3 py-2 pr-8 text-xs text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] cursor-pointer">
                            <option value="Semua status" {{ request('status') == 'Semua status' ? 'selected' : '' }}>Semua status</option>
                            <option value="Terisi" {{ request('status') == 'Terisi' ? 'selected' : '' }}>Terisi</option>
                            <option value="Tersedia" {{ request('status') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                            <option value="Dibatalkan" {{ request('status') == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2.5 text-gray-400">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </div>

                @if(request()->hasAny(['tanggal', 'pewawancara', 'status']))
                    <a href="{{ route($routePrefix . 'wawancara') }}" class="text-xs text-[#004ADA] hover:underline pt-4">Reset filter</a>
                @endif
            </form>

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
            @forelse($groupedJadwals as $dateKey => $slots)
                @php
                    $groupDateFormatted = \Carbon\Carbon::parse($dateKey)->locale('id')->isoFormat('dddd, D MMMM Y');
                    $availableCount = $slots->where('status', 'Tersedia')->count();
                    $totalGroupSlots = $slots->count();
                @endphp
                <div class="border border-gray-200/90 rounded-2xl overflow-hidden">
                    <!-- Group Header Banner -->
                    <div class="bg-gray-50/80 px-4 py-3 border-b border-gray-200/80 flex items-center justify-between">
                        <span class="font-bold text-xs sm:text-sm text-[#1F1F1F]">{{ $groupDateFormatted }}</span>
                        <span class="text-xs text-[#707070]">{{ $totalGroupSlots }} slot · {{ $availableCount }} tersedia</span>
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
                                @foreach($slots as $slot)
                                    <tr class="hover:bg-slate-50/50 transition-colors">
                                        <td class="py-3 px-4 font-medium text-[#1F1F1F]">{{ $slot->tanggal_pendek }}</td>
                                        <td class="py-3 px-4 font-semibold text-[#1F1F1F]">{{ $slot->jam_range }}</td>
                                        <td class="py-3 px-4 text-[#707070] leading-tight">{{ $slot->pewawancara }}</td>
                                        <td class="py-3 px-4 font-medium text-[#1F1F1F]">
                                            <span class="inline-block px-2 py-0.5 rounded text-[11px] {{ $slot->mode === 'Online' ? 'bg-purple-50 text-purple-700 font-semibold' : 'text-[#1F1F1F]' }}">
                                                {{ $slot->mode }}
                                            </span>
                                        </td>
                                        <td class="py-3 px-4">
                                            @if($slot->status === 'Terisi')
                                                <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#EBF2FE] text-[#004ADA]">
                                                    Terisi
                                                </span>
                                            @elseif($slot->status === 'Tersedia')
                                                <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#EAF8F0] text-[#1E8E3E]">
                                                    Tersedia
                                                </span>
                                            @else
                                                <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-gray-100 text-gray-500">
                                                    {{ $slot->status }}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="py-3 px-4">
                                            @if($slot->pendaftar)
                                                <a href="{{ route($routePrefix . 'detail', ['id' => $slot->pendaftar->id]) }}" class="hover:underline">
                                                    <p class="font-semibold text-[#1F1F1F]">{{ $slot->pendaftar->name }}</p>
                                                    <p class="text-[11px] text-[#707070]">{{ $slot->pendaftar->nim }}</p>
                                                </a>
                                            @elseif($slot->status === 'Tersedia')
                                                <button type="button" onclick="openJadwalkanModal({{ $slot->id }}, '{{ $groupDateFormatted }}', '{{ $slot->jam_range }}', '{{ $slot->mode }}', '{{ addslashes($slot->pewawancara) }}')" class="inline-flex items-center gap-1 px-3 py-1 bg-white border border-[#004ADA] text-[#004ADA] hover:bg-blue-50 rounded-lg text-xs font-semibold transition-colors cursor-pointer">
                                                    Pilih pendaftar
                                                </button>
                                            @else
                                                <span class="text-gray-400">—</span>
                                            @endif
                                        </td>
                                        <td class="py-3 pr-4 text-center">
                                            <form action="{{ route($routePrefix . 'destroy-jadwal', $slot->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus slot wawancara ini?')" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="Hapus slot" class="text-gray-400 hover:text-red-600 p-1 transition-colors cursor-pointer">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @empty
                <div class="p-12 text-center border border-dashed border-gray-200 rounded-2xl bg-gray-50/50">
                    <p class="text-sm font-semibold text-[#1F1F1F]">Belum ada jadwal wawancara</p>
                    <p class="text-xs text-[#707070] mt-1">Gunakan tombol "+ Tambah Jadwal" untuk membuat dan meng-generate slot baru secara otomatis.</p>
                    <div class="mt-4">
                        <a href="{{ route($routePrefix . 'tambah-jadwal') }}" class="inline-flex items-center gap-1.5 px-4 py-2 bg-[#004ADA] text-white text-xs font-semibold rounded-xl hover:bg-[#003bb0] transition-colors">
                            + Tambah Jadwal Sekarang
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- ============================================================== -->
        <!-- VIEW 2: KALENDER VIEW                                          -->
        <!-- ============================================================== -->
        <div id="view-kalender" class="hidden space-y-4">
            <!-- Calendar Navigation Header -->
            <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                <h3 class="font-bold text-sm sm:text-base text-[#1F1F1F]">November 2026</h3>
                <div class="flex items-center gap-1.5">
                    <span class="text-xs text-[#707070] mr-2">Jadwal Aktif Terdaftar</span>
                </div>
            </div>

            <!-- Calendar Summary Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($groupedJadwals as $dateKey => $slots)
                    @php
                        $groupDate = \Carbon\Carbon::parse($dateKey);
                    @endphp
                    <div class="p-4 bg-white border border-gray-200 rounded-2xl shadow-2xs hover:border-[#004ADA] transition-all">
                        <div class="flex items-center justify-between mb-2">
                            <span class="font-bold text-sm text-[#1F1F1F]">{{ $groupDate->locale('id')->isoFormat('dddd, D MMM Y') }}</span>
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-blue-50 text-[#004ADA]">
                                {{ $slots->count() }} slot
                            </span>
                        </div>
                        <div class="space-y-1.5 text-xs text-[#707070]">
                            <p class="flex items-center justify-between">
                                <span>Tersedia:</span>
                                <strong class="text-emerald-600">{{ $slots->where('status', 'Tersedia')->count() }} slot</strong>
                            </p>
                            <p class="flex items-center justify-between">
                                <span>Terisi:</span>
                                <strong class="text-[#004ADA]">{{ $slots->where('status', 'Terisi')->count() }} slot</strong>
                            </p>
                            <p class="text-[11px] text-gray-400 mt-2 truncate">Pewawancara: {{ $slots->first()->pewawancara ?? '-' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Card Footer Info -->
        <div class="mt-6 pt-5 border-t border-gray-100 flex flex-col sm:flex-row items-start sm:items-center justify-between text-xs text-[#707070] gap-2">
            <div>
                <span class="font-semibold text-[#1F1F1F]">{{ $totalSlots }} total slot wawancara</span>
            </div>
            <div>
                Semua waktu dalam Waktu Indonesia Barat (WIB)
            </div>
        </div>
        <p class="text-[11px] text-[#8E8E93] mt-2 leading-relaxed">
            Hanya pendaftar berstatus Lolos Berkas yang dapat dijadwalkan. Slot terisi otomatis tersinkronisasi dengan portal pendaftar dan detail akun.
        </p>
    </div>
</div>

<!-- ============================================================== -->
<!-- MODAL: JADWALKAN PENDAFTAR                                     -->
<!-- ============================================================== -->
<div id="modal-jadwalkan" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/40 hidden">
    <div class="bg-white rounded-[24px] max-w-lg w-full p-6 sm:p-7 shadow-2xl border border-gray-100 transform transition-all">
        <h3 class="text-lg font-bold text-[#1F1F1F] mb-4">Jadwalkan wawancara</h3>

        <form id="form-assign-jadwal" method="POST" action="">
            @csrf
            <!-- Session Detail Box -->
            <div class="bg-gray-50 border border-gray-200/80 rounded-2xl p-4 mb-5 text-xs text-[#1F1F1F] space-y-1">
                <p id="modal-session-datetime" class="font-semibold">-</p>
                <p id="modal-session-interviewers" class="text-[#707070]">-</p>
            </div>

            <!-- Select Pendaftar -->
            <div class="mb-4">
                <label class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                    Pendaftar (Status Lolos Berkas) <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <select name="pendaftar_id" required class="w-full appearance-none bg-white border border-gray-200 rounded-xl px-4 py-2.5 pr-8 text-xs text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] cursor-pointer">
                        @forelse($pendaftarsLolosBerkas as $p)
                            <option value="{{ $p->id }}">{{ $p->name }} ({{ $p->nim }}) - {{ $p->division }}</option>
                        @empty
                            <option value="" disabled selected>Tidak ada pendaftar lolos berkas yang belum terjadwal</option>
                        @endforelse
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </div>
                <p class="text-[11px] text-[#8E8E93] mt-1.5">Pendaftar yang dipilih akan menerima jadwal sesi wawancara ini.</p>
            </div>

            <!-- Modal Actions -->
            <div class="flex items-center justify-end gap-3 pt-3 border-t border-gray-100">
                <button type="button" onclick="closeJadwalkanModal()" class="px-4 py-2 border border-gray-200 rounded-xl text-xs font-medium text-[#707070] hover:text-[#1F1F1F] hover:bg-gray-50 transition-colors cursor-pointer">
                    Batal
                </button>
                <button type="submit" class="px-5 py-2 bg-[#004ADA] hover:bg-[#003bb0] text-white rounded-xl text-xs font-semibold shadow-xs transition-colors cursor-pointer">
                    Jadwalkan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Interactive Switcher & Modal Script -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btnDaftar = document.getElementById('tab-btn-daftar');
        const btnKalender = document.getElementById('tab-btn-kalender');
        const viewDaftar = document.getElementById('view-daftar');
        const viewKalender = document.getElementById('view-kalender');

        btnDaftar?.addEventListener('click', () => {
            btnDaftar.classList.add('bg-[#004ADA]', 'text-white', 'shadow-xs');
            btnDaftar.classList.remove('text-[#707070]');
            btnKalender.classList.remove('bg-[#004ADA]', 'text-white', 'shadow-xs');
            btnKalender.classList.add('text-[#707070]');
            viewDaftar.classList.remove('hidden');
            viewKalender.classList.add('hidden');
        });

        btnKalender?.addEventListener('click', () => {
            btnKalender.classList.add('bg-[#004ADA]', 'text-white', 'shadow-xs');
            btnKalender.classList.remove('text-[#707070]');
            btnDaftar.classList.remove('bg-[#004ADA]', 'text-white', 'shadow-xs');
            btnDaftar.classList.add('text-[#707070]');
            viewKalender.classList.remove('hidden');
            viewDaftar.classList.add('hidden');
        });
    });

    function openJadwalkanModal(slotId, date, time, mode, interviewers) {
        const modal = document.getElementById('modal-jadwalkan');
        const form = document.getElementById('form-assign-jadwal');
        document.getElementById('modal-session-datetime').textContent = `${date} · ${time} · ${mode}`;
        document.getElementById('modal-session-interviewers').textContent = interviewers;
        
        form.action = `{{ url(request()->is('staff*') ? 'staff' : 'admin') }}/jadwal-wawancara/${slotId}/assign`;
        modal.classList.remove('hidden');
    }

    function closeJadwalkanModal() {
        document.getElementById('modal-jadwalkan').classList.add('hidden');
    }
</script>
@endsection
