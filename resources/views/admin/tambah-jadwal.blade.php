@php
    $isStaff = request()->is('staff*');
    $routePrefix = $isStaff ? 'staff.pendaftar.' : 'admin.pendaftar.';
    $portalLabel = $isStaff ? 'Staff KMID' : 'Admin KMID';
    $roleName = $isStaff ? 'Staff Managerial' : 'Administrator';
@endphp

@extends('layouts.admin')

@section('title', $portalLabel . ' - Tambah Jadwal Wawancara')
@section('topbar_breadcrumb', $portalLabel . ' / Tambah Jadwal')
@section('profile_role', $roleName)

@section('footer_left', 'KMID UGM · Pengelolaan pendaftaran')
@section('footer_right', 'Sistem Jadwal Otomatis')

@section('content')
<div class="space-y-6 max-w-5xl">
    <!-- Breadcrumb & Page Heading -->
    <div>
        <nav class="flex items-center gap-1.5 text-xs text-[#8E8E93] mb-1.5">
            <span>{{ $isStaff ? 'Staff' : 'Admin' }}</span>
            <span>/</span>
            <span>Pengelolaan pendaftaran</span>
            <span>/</span>
            <a href="{{ route($routePrefix . 'wawancara') }}" class="hover:underline">Jadwal Wawancara</a>
            <span>/</span>
            <span class="text-[#1F1F1F] font-medium">Tambah Jadwal</span>
        </nav>
        <h1 class="text-2xl sm:text-3xl font-bold text-[#1F1F1F] tracking-tight">Tambah Jadwal Wawancara</h1>
        <!-- Orange Accent Bar -->
        <div class="w-12 h-1 bg-[#FEA515] rounded-full mt-2"></div>
    </div>

    <!-- Back Button Link -->
    <div>
        <a href="{{ route($routePrefix . 'wawancara') }}" class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold text-[#004ADA] hover:underline">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali ke jadwal wawancara
        </a>
    </div>

    @if ($errors->any())
        <div class="p-4 bg-red-50 border border-red-200 text-red-700 rounded-2xl text-xs sm:text-sm">
            <p class="font-bold mb-1">Periksa isian formulir:</p>
            <ul class="list-disc list-inside space-y-0.5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Card -->
    <div class="bg-white rounded-[24px] sm:rounded-[28px] p-6 sm:p-8 lg:p-10 shadow-[0_10px_35px_rgba(0,0,0,0.03)] border border-gray-100/90">
        <!-- Card Header Info -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 pb-6 border-b border-gray-100 mb-6">
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-[#1F1F1F]">Informasi jadwal</h2>
                <p class="text-xs text-[#707070] mt-0.5">Tentukan waktu dan pewawancara, lalu generate slot untuk ditinjau sebelum disimpan.</p>
            </div>
            <span class="text-xs text-[#8E8E93]">Tanda <span class="text-red-500">*</span> wajib diisi</span>
        </div>

        <form id="form-tambah-jadwal" action="{{ route($routePrefix . 'store-jadwal') }}" method="POST" class="space-y-6">
            @csrf
            <input type="hidden" id="slots_json" name="slots_json" value="">

            <!-- 2-Column Fields Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-5 gap-x-8 text-xs sm:text-sm">
                <!-- Col 1: Tanggal -->
                <div>
                    <label for="input_tanggal" class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Tanggal <span class="text-red-500">*</span>
                    </label>
                    <input type="date" id="input_tanggal" name="tanggal" value="{{ old('tanggal', date('Y-m-d', strtotime('+1 day'))) }}" min="{{ date('Y-m-d') }}" required class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA] transition-all">
                    <p class="text-[11px] text-[#8E8E93] mt-1">Pilih tanggal pelaksanaan wawancara.</p>
                </div>

                <!-- Col 2: Nama Pewawancara -->
                <div>
                    <label for="input_pewawancara" class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Nama pewawancara <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="input_pewawancara" name="pewawancara" value="{{ old('pewawancara', 'Dwi Putri Lestari') }}" placeholder="Contoh: Dwi Putri Lestari & Rizky Aditya" required class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA] transition-all">
                    <p class="text-[11px] text-[#8E8E93] mt-1">Dapat diisi satu atau beberapa nama pewawancara.</p>
                </div>

                <!-- Col 1: Jam Mulai -->
                <div>
                    <label for="input_jam_mulai" class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Jam mulai <span class="text-red-500">*</span>
                    </label>
                    <input type="time" id="input_jam_mulai" name="jam_mulai" value="{{ old('jam_mulai', '09:00') }}" required class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA] transition-all">
                    <p class="text-[11px] text-[#8E8E93] mt-1">Waktu Indonesia Barat (WIB).</p>
                </div>

                <!-- Col 2: Jam Selesai -->
                <div>
                    <label for="input_jam_selesai" class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Jam selesai <span class="text-red-500">*</span>
                    </label>
                    <input type="time" id="input_jam_selesai" name="jam_selesai" value="{{ old('jam_selesai', '11:00') }}" required class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA] transition-all">
                    <p class="text-[11px] text-[#8E8E93] mt-1">Harus setelah jam mulai.</p>
                </div>

                <!-- Col 1: Durasi per sesi -->
                <div>
                    <label for="input_durasi" class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Durasi per sesi <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select id="input_durasi" name="durasi_menit" class="w-full appearance-none bg-white border border-gray-200 rounded-xl px-4 py-2.5 pr-8 text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] cursor-pointer transition-all">
                            <option value="15" selected>15 menit</option>
                            <option value="20">20 menit</option>
                            <option value="30">30 menit</option>
                            <option value="45">45 menit</option>
                            <option value="60">60 menit (1 jam)</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-[11px] text-[#8E8E93] mt-1">Rentang waktu dibagi otomatis sesuai durasi per sesi.</p>
                </div>

                <!-- Col 2: Kuota -->
                <div>
                    <label for="input_kuota" class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Kuota per slot <span class="text-red-500">*</span>
                    </label>
                    <input type="number" id="input_kuota" name="kuota" value="1" min="1" max="10" required class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA] transition-all">
                    <p class="text-[11px] text-[#8E8E93] mt-1">Jumlah maksimal pendaftar per slot waktu.</p>
                </div>

                <!-- Col 1: Mode -->
                <div>
                    <label for="input_mode" class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Mode wawancara <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select id="input_mode" name="mode" class="w-full appearance-none bg-white border border-gray-200 rounded-xl px-4 py-2.5 pr-8 text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] cursor-pointer transition-all">
                            <option value="Offline" selected>Offline</option>
                            <option value="Online">Online</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-[11px] text-[#8E8E93] mt-1">Pilihan: Offline (Tatap Muka) atau Online (Daring)</p>
                </div>

                <!-- Col 2: Link atau Lokasi -->
                <div>
                    <label for="input_lokasi" class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Link atau lokasi <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="input_lokasi" name="lokasi" value="Ruang Diskusi KMID, Sekolah Vokasi UGM" required placeholder="Tautan Google Meet / Ruang pertemuan" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA] transition-all">
                    <p class="text-[11px] text-[#8E8E93] mt-1">Isi tautan untuk Online atau ruang/lokasi untuk Offline.</p>
                </div>
            </div>

            <!-- Generate Button Action -->
            <div class="pt-3 flex items-center gap-3">
                <button type="button" id="btn-generate-slots" class="inline-flex items-center gap-2 px-6 py-2.5 bg-[#004ADA] hover:bg-[#003bb0] active:scale-[0.99] text-white rounded-xl text-xs sm:text-sm font-semibold shadow-md shadow-blue-600/20 transition-all cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                    <span>Generate slot otomatis</span>
                </button>
                <span id="generate-feedback" class="text-xs text-emerald-600 font-semibold hidden flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span>Slot berhasil digenerate!</span>
                </span>
            </div>

            <!-- ============================================================== -->
            <!-- PRATINJAU SLOT SECTION                                         -->
            <!-- ============================================================== -->
            <div class="pt-6 border-t border-gray-100 space-y-4">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                    <div class="flex items-center gap-2.5 flex-wrap">
                        <h3 class="text-sm sm:text-base font-bold text-[#1F1F1F]">Pratinjau slot</h3>
                        <span id="preview-slot-badge" class="px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#EBF2FE] text-[#004ADA]">
                            0 slot
                        </span>
                        <span id="preview-summary-date" class="text-xs text-[#707070]">-</span>
                        <span class="text-xs text-[#707070]">·</span>
                        <span id="preview-summary-time" class="text-xs text-[#707070]">-</span>
                    </div>
                </div>
                <p class="text-xs text-[#707070]">Periksa slot yang terbentuk di bawah ini. Anda dapat menghapus slot tertentu dari pratinjau sebelum menyimpannya.</p>

                <!-- Table Preview -->
                <div class="overflow-x-auto border border-gray-200/90 rounded-2xl">
                    <table class="w-full text-left border-collapse min-w-[650px] text-xs">
                        <thead>
                            <tr class="bg-gray-50/80 border-b border-gray-200/80 text-[11px] font-semibold text-[#8E8E93] uppercase tracking-wider">
                                <th class="py-2.5 px-4 w-12 text-center">No</th>
                                <th class="py-2.5 px-4">Tanggal</th>
                                <th class="py-2.5 px-4">Jam</th>
                                <th class="py-2.5 px-4">Pewawancara</th>
                                <th class="py-2.5 px-4">Mode</th>
                                <th class="py-2.5 px-4 w-20">Kuota</th>
                                <th class="py-2.5 pr-4 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white" id="preview-slot-tbody">
                            <!-- Rows will be dynamically rendered by JavaScript -->
                        </tbody>
                    </table>
                </div>

                <!-- Footer Summary of preview -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between text-xs text-[#707070] gap-2 pt-2">
                    <p class="text-[11px] text-[#8E8E93]">Slot baru berstatus <strong class="text-emerald-600">Tersedia</strong> setelah disimpan.</p>
                    <p id="preview-footer-count" class="font-medium text-[#1F1F1F]">0 slot akan disimpan · Kuota 1 per slot</p>
                </div>
            </div>

            <!-- Bottom Action Buttons -->
            <div class="pt-6 border-t border-gray-100 flex items-center justify-end gap-3">
                <a href="{{ route($routePrefix . 'wawancara') }}" class="px-5 py-2.5 rounded-xl border border-gray-200 text-xs sm:text-sm font-medium text-[#707070] hover:text-[#1F1F1F] hover:bg-gray-50 transition-colors">
                    Batal
                </a>
                <button type="submit" id="btn-submit-simpan" class="px-6 py-2.5 rounded-xl bg-[#004ADA] hover:bg-[#003bb0] text-xs sm:text-sm font-medium text-white shadow-[0_4px_14px_rgba(0,74,218,0.25)] transition-all cursor-pointer">
                    Simpan Jadwal Wawancara
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Elements
        const inputTanggal = document.getElementById('input_tanggal');
        const inputPewawancara = document.getElementById('input_pewawancara');
        const inputJamMulai = document.getElementById('input_jam_mulai');
        const inputJamSelesai = document.getElementById('input_jam_selesai');
        const inputDurasi = document.getElementById('input_durasi');
        const inputKuota = document.getElementById('input_kuota');
        const inputMode = document.getElementById('input_mode');
        const inputLokasi = document.getElementById('input_lokasi');

        const btnGenerate = document.getElementById('btn-generate-slots');
        const feedback = document.getElementById('generate-feedback');
        const previewTbody = document.getElementById('preview-slot-tbody');
        const badgeSlot = document.getElementById('preview-slot-badge');
        const summaryDate = document.getElementById('preview-summary-date');
        const summaryTime = document.getElementById('preview-summary-time');
        const footerCount = document.getElementById('preview-footer-count');
        const inputSlotsJson = document.getElementById('slots_json');
        const btnSubmit = document.getElementById('btn-submit-simpan');
        const formTambah = document.getElementById('form-tambah-jadwal');

        let generatedSlots = [];

        // Month Names in Indonesian
        const namaBulanIndo = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        const namaBulanPendekIndo = [
            'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
            'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'
        ];

        function formatTanggalIndo(dateStr) {
            if (!dateStr) return '-';
            const parts = dateStr.split('-');
            if (parts.length !== 3) return dateStr;
            const year = parts[0];
            const month = parseInt(parts[1], 10) - 1;
            const day = parseInt(parts[2], 10);
            return `${day} ${namaBulanIndo[month]} ${year}`;
        }

        function formatTanggalPendek(dateStr) {
            if (!dateStr) return '-';
            const parts = dateStr.split('-');
            if (parts.length !== 3) return dateStr;
            const year = parts[0];
            const month = parseInt(parts[1], 10) - 1;
            const day = parseInt(parts[2], 10);
            return `${day} ${namaBulanPendekIndo[month]} ${year}`;
        }

        function minutesToTimeStr(totalMinutes) {
            const h = Math.floor(totalMinutes / 60);
            const m = totalMinutes % 60;
            return `${String(h).padStart(2, '0')}:${String(m).padStart(2, '0')}`;
        }

        function timeStrToMinutes(timeStr) {
            const parts = timeStr.split(':');
            return parseInt(parts[0], 10) * 60 + parseInt(parts[1], 10);
        }

        function generateSlots() {
            const tanggal = inputTanggal.value;
            const pewawancara = inputPewawancara.value.trim();
            const jamMulai = inputJamMulai.value;
            const jamSelesai = inputJamSelesai.value;
            const durasi = parseInt(inputDurasi.value, 10);
            const kuota = parseInt(inputKuota.value, 10) || 1;
            const mode = inputMode.value;
            const lokasi = inputLokasi.value.trim();

            if (!tanggal) {
                alert('Silakan pilih tanggal terlebih dahulu.');
                inputTanggal.focus();
                return;
            }
            if (!pewawancara) {
                alert('Nama pewawancara wajib diisi.');
                inputPewawancara.focus();
                return;
            }
            if (!jamMulai || !jamSelesai) {
                alert('Jam mulai dan jam selesai wajib diisi.');
                return;
            }

            const startMin = timeStrToMinutes(jamMulai);
            const endMin = timeStrToMinutes(jamSelesai);

            if (endMin <= startMin) {
                alert('Jam selesai harus lebih besar / setelah jam mulai.');
                inputJamSelesai.focus();
                return;
            }

            if (endMin - startMin < durasi) {
                alert(`Rentang waktu (${endMin - startMin} menit) lebih kecil dari durasi per sesi (${durasi} menit).`);
                return;
            }

            generatedSlots = [];
            let current = startMin;
            let slotIndex = 1;

            while (current + durasi <= endMin) {
                const sMulai = minutesToTimeStr(current);
                const sSelesai = minutesToTimeStr(current + durasi);

                generatedSlots.push({
                    id: 'slot_' + Date.now() + '_' + slotIndex,
                    tanggal: tanggal,
                    jam_mulai: sMulai,
                    jam_selesai: sSelesai,
                    pewawancara: pewawancara,
                    durasi_menit: durasi,
                    kuota: kuota,
                    mode: mode,
                    lokasi: lokasi
                });

                current += durasi;
                slotIndex++;
            }

            renderPreview();

            // Visual feedback
            if (feedback) {
                feedback.classList.remove('hidden');
                setTimeout(() => {
                    feedback.classList.add('hidden');
                }, 3000);
            }
        }

        function renderPreview() {
            previewTbody.innerHTML = '';

            const tanggal = inputTanggal.value;
            const jamMulai = inputJamMulai.value;
            const jamSelesai = inputJamSelesai.value;
            const durasi = inputDurasi.value;
            const kuota = inputKuota.value || 1;

            badgeSlot.textContent = `${generatedSlots.length} slot`;
            summaryDate.textContent = formatTanggalIndo(tanggal);
            summaryTime.textContent = `${jamMulai.replace(':', '.')}-${jamSelesai.replace(':', '.')} / ${durasi} menit`;
            footerCount.textContent = `${generatedSlots.length} slot akan disimpan · Kuota ${kuota} per slot`;

            inputSlotsJson.value = JSON.stringify(generatedSlots);

            if (generatedSlots.length === 0) {
                previewTbody.innerHTML = `
                    <tr>
                        <td colspan="7" class="py-8 px-4 text-center text-gray-400">
                            <p class="font-medium text-xs sm:text-sm">Belum ada slot dalam pratinjau.</p>
                            <p class="text-[11px] text-gray-400 mt-1">Klik tombol <strong>"Generate slot otomatis"</strong> di atas untuk membuat jadwal.</p>
                        </td>
                    </tr>
                `;
                btnSubmit.disabled = true;
                btnSubmit.classList.add('opacity-50', 'cursor-not-allowed');
                return;
            }

            btnSubmit.disabled = false;
            btnSubmit.classList.remove('opacity-50', 'cursor-not-allowed');

            generatedSlots.forEach((slot, idx) => {
                const tr = document.createElement('tr');
                tr.className = 'hover:bg-slate-50/60 transition-colors';
                tr.id = `row-${slot.id}`;

                const jamFormatted = `${slot.jam_mulai.replace(':', '.')}-${slot.jam_selesai.replace(':', '.')} WIB`;
                const tglFormatted = formatTanggalPendek(slot.tanggal);

                tr.innerHTML = `
                    <td class="py-3 px-4 text-center font-medium text-gray-400">${idx + 1}</td>
                    <td class="py-3 px-4 font-medium text-[#1F1F1F]">${tglFormatted}</td>
                    <td class="py-3 px-4 font-semibold text-[#004ADA]">${jamFormatted}</td>
                    <td class="py-3 px-4 text-[#707070]">${slot.pewawancara}</td>
                    <td class="py-3 px-4">
                        <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold ${slot.mode === 'Online' ? 'bg-purple-50 text-purple-700 border border-purple-100' : 'bg-blue-50 text-blue-700 border border-blue-100'}">
                            ${slot.mode}
                        </span>
                    </td>
                    <td class="py-3 px-4 text-[#707070]">${slot.kuota}</td>
                    <td class="py-3 pr-4 text-right">
                        <button type="button" class="btn-remove-slot text-xs font-semibold text-rose-500 hover:text-rose-700 hover:underline transition-colors cursor-pointer inline-flex items-center gap-1" data-id="${slot.id}">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            <span>Hapus</span>
                        </button>
                    </td>
                `;

                previewTbody.appendChild(tr);
            });

            // Bind remove button handlers
            document.querySelectorAll('.btn-remove-slot').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const id = btn.getAttribute('data-id');
                    generatedSlots = generatedSlots.filter(s => s.id !== id);
                    renderPreview();
                });
            });
        }

        btnGenerate.addEventListener('click', generateSlots);

        // Auto-regenerate preview when parameters change
        [inputTanggal, inputPewawancara, inputJamMulai, inputJamSelesai, inputDurasi, inputKuota, inputMode, inputLokasi].forEach(el => {
            el?.addEventListener('change', generateSlots);
        });

        // Initial generation on page load for seamless UX
        generateSlots();

        // Submit handler feedback
        formTambah.addEventListener('submit', (e) => {
            if (!generatedSlots || generatedSlots.length === 0) {
                generateSlots();
            }
            if (!generatedSlots || generatedSlots.length === 0) {
                e.preventDefault();
                alert('Belum ada slot wawancara yang siap disimpan. Pastikan jam selesai lebih besar dari jam mulai dan klik "Generate slot otomatis".');
                return;
            }

            inputSlotsJson.value = JSON.stringify(generatedSlots);

            btnSubmit.classList.add('opacity-75', 'cursor-not-allowed');
            btnSubmit.innerHTML = `
                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline-block" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span>Menyimpan ${generatedSlots.length} slot...</span>
            `;

            // Use timeout so form dispatch is not canceled by immediate button disabling
            setTimeout(() => {
                btnSubmit.disabled = true;
            }, 100);
        });
    });
</script>
@endsection
