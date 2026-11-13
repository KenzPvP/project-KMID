@extends('layouts.admin')
@section('show_content_management', true)

@section('title', 'Admin KMID - Edit Pengurus')
@section('topbar_breadcrumb', 'Admin KMID / Kepengurusan / Edit Pengurus')

@section('footer_left', 'KMID UGM · Pengelolaan konten')
@section('footer_right', 'Data kepengurusan')

@section('content')
<div class="space-y-6 max-w-4xl">
    <!-- Breadcrumb & Page Heading -->
    <div>
        <nav class="flex items-center gap-1.5 text-xs text-[#8E8E93] mb-1.5">
            <span>Admin</span>
            <span>/</span>
            <span>Pengelolaan konten</span>
            <span>/</span>
            <a href="{{ route('admin.kepengurusan') }}" class="hover:underline">Kepengurusan</a>
            <span>/</span>
            <span class="text-[#1F1F1F] font-medium">Edit Pengurus</span>
        </nav>
        <h1 class="text-2xl sm:text-3xl font-bold text-[#1F1F1F] tracking-tight">Edit Pengurus</h1>
    </div>

    <!-- Back Button Link -->
    <div>
        <a href="{{ route('admin.kepengurusan') }}" class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold text-[#004ADA] hover:underline">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali ke daftar kepengurusan
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
                <h2 class="text-lg sm:text-xl font-bold text-[#1F1F1F]">Data pengurus</h2>
                <p class="text-xs text-[#707070] mt-0.5">Perbarui identitas, jabatan, dan struktur kepengurusan KMID.</p>
            </div>
            <span class="text-xs text-[#8E8E93]">Tanda <span class="text-red-500">*</span> wajib diisi</span>
        </div>

        <form action="{{ route('admin.kepengurusan.update', $pengurus) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- 2-Column Fields Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-5 gap-x-8 text-xs sm:text-sm">
                <!-- Col 1: Nama Lengkap & Gelar -->
                <div>
                    <label for="name" class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Nama lengkap & gelar <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="{{ old('name', $pengurus->name) }}" 
                           placeholder="Contoh: Dr. Ir. Tariq Hifzhillah, M.Eng. / Ahmad Tariq" 
                           required 
                           class="w-full px-4 py-2.5 bg-white border @error('name') border-red-400 @else border-gray-200 @enderror rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA]">
                    @error('name')
                        <p class="text-[11px] text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Col 2: Email -->
                <div>
                    <label for="email" class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Email
                    </label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="{{ old('email', $pengurus->email) }}" 
                           placeholder="nama@mail.ugm.ac.id" 
                           class="w-full px-4 py-2.5 bg-white border @error('email') border-red-400 @else border-gray-200 @enderror rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA]">
                    <p class="text-[11px] text-[#8E8E93] mt-1">Dapat dikosongkan jika belum tersedia.</p>
                    @error('email')
                        <p class="text-[11px] text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Col 1: Kelompok Struktur -->
                <div>
                    <label for="group" class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Kelompok struktur <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select id="group" 
                                name="group" 
                                required 
                                class="w-full appearance-none bg-white border @error('group') border-red-400 @else border-gray-200 @enderror rounded-xl px-4 py-2.5 pr-8 text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] cursor-pointer">
                            <option value="">Pilih Kelompok Struktur...</option>
                            <option value="Pembina Komunitas" {{ old('group', $pengurus->group) === 'Pembina Komunitas' ? 'selected' : '' }}>Pembina Komunitas</option>
                            <option value="Badan Pengurus Harian (BPH)" {{ old('group', $pengurus->group) === 'Badan Pengurus Harian (BPH)' ? 'selected' : '' }}>Badan Pengurus Harian (BPH)</option>
                            <option value="Koordinator Divisi" {{ old('group', $pengurus->group) === 'Koordinator Divisi' ? 'selected' : '' }}>Koordinator Divisi</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                    @error('group')
                        <p class="text-[11px] text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Col 2: Jabatan -->
                <div>
                    <label for="position" class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Jabatan <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="position" 
                           name="position" 
                           value="{{ old('position', $pengurus->position) }}" 
                           placeholder="Contoh: Ketua Umum / Koordinator Media Creative" 
                           required 
                           class="w-full px-4 py-2.5 bg-white border @error('position') border-red-400 @else border-gray-200 @enderror rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA]">
                    @error('position')
                        <p class="text-[11px] text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Col 1: Departemen / Fakultas / Instansi -->
                <div>
                    <label for="department" class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Departemen / Instansi / Prodi / Fakultas
                    </label>
                    <input type="text" 
                           id="department" 
                           name="department" 
                           value="{{ old('department', $pengurus->department) }}" 
                           placeholder="Contoh: Teknologi Informasi 2025 · Fakultas Teknik" 
                           class="w-full px-4 py-2.5 bg-white border @error('department') border-red-400 @else border-gray-200 @enderror rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA]">
                    @error('department')
                        <p class="text-[11px] text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Col 2: Periode Kepengurusan -->
                <div>
                    <label for="period" class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Periode kepengurusan <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select id="period" 
                                name="period" 
                                required 
                                class="w-full appearance-none bg-white border @error('period') border-red-400 @else border-gray-200 @enderror rounded-xl px-4 py-2.5 pr-8 text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] cursor-pointer">
                            <option value="Periode 2025/2026" {{ old('period', $pengurus->period) === 'Periode 2025/2026' ? 'selected' : '' }}>Periode 2025/2026</option>
                            <option value="Periode 2024/2025" {{ old('period', $pengurus->period) === 'Periode 2024/2025' ? 'selected' : '' }}>Periode 2024/2025</option>
                            <option value="Periode 2023/2024" {{ old('period', $pengurus->period) === 'Periode 2023/2024' ? 'selected' : '' }}>Periode 2023/2024</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                    @error('period')
                        <p class="text-[11px] text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Col 1: Urutan Tampil -->
                <div>
                    <label for="order" class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Urutan tampil
                    </label>
                    <input type="number" 
                           id="order" 
                           name="order" 
                           value="{{ old('order', $pengurus->order) }}" 
                           min="1" 
                           class="w-full px-4 py-2.5 bg-white border @error('order') border-red-400 @else border-gray-200 @enderror rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA]">
                    <p class="text-[11px] text-[#8E8E93] mt-1">Angka lebih kecil tampil lebih awal (contoh: 1, 2, 3, dst).</p>
                    @error('order')
                        <p class="text-[11px] text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Col 2: Status Publikasi -->
                <div>
                    <label for="status" class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                        Status publikasi <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select id="status" 
                                name="status" 
                                required 
                                class="w-full appearance-none bg-white border @error('status') border-red-400 @else border-gray-200 @enderror rounded-xl px-4 py-2.5 pr-8 text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] cursor-pointer">
                            <option value="Dipublikasikan" {{ old('status', $pengurus->status) === 'Dipublikasikan' ? 'selected' : '' }}>Dipublikasikan (Tampil ke publik)</option>
                            <option value="Draf" {{ old('status', $pengurus->status) === 'Draf' ? 'selected' : '' }}>Draf (Disimpan sementara)</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                    @error('status')
                        <p class="text-[11px] text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Akses Akun Login Staff -->
                <div class="col-span-1 sm:col-span-2 pt-4 pb-2 border-t border-gray-100">
                    <div class="flex items-start gap-3 p-4 {{ ($userAccount && $userAccount->role === 'staff') ? 'bg-emerald-50/70 border-emerald-100/90' : 'bg-blue-50/70 border-blue-100/90' }} rounded-2xl border mb-4">
                        <div class="pt-0.5">
                            <input type="checkbox" 
                                   id="give_staff_access" 
                                   name="give_staff_access" 
                                   value="1" 
                                   {{ old('give_staff_access', ($userAccount && $userAccount->role === 'staff') ? '1' : '1') == '1' ? 'checked' : '' }}
                                   class="w-4 h-4 text-[#004ADA] rounded border-gray-300 focus:ring-[#004ADA] cursor-pointer">
                        </div>
                        <div>
                            <label for="give_staff_access" class="text-xs sm:text-sm font-bold text-[#1F1F1F] cursor-pointer">
                                Berikan / Sinkronkan Hak Akses Login Staff (Role: Staff)
                            </label>
                            <p class="text-[11px] text-[#707070] mt-0.5 leading-relaxed">
                                @if($userAccount && $userAccount->role === 'staff')
                                    <span class="inline-flex items-center gap-1 font-semibold text-emerald-700">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        Akun telah aktif sebagai Staff (Role: staff).
                                    </span>
                                @elseif($userAccount)
                                    <span class="text-amber-700 font-semibold">Akun saat ini terdaftar dengan peran: {{ $userAccount->role }}. Centang untuk mengubahnya menjadi Staff.</span>
                                @else
                                    <span>Pengurus ini belum memiliki akun user login. Centang untuk otomatis membuatkan akun Staff.</span>
                                @endif
                                Ketika login di halaman login, akun ini otomatis langsung diarahkan ke <strong>Dashboard Staff</strong>.
                            </p>
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                            Ganti kata sandi login staff (Opsional)
                        </label>
                        <input type="text" 
                               id="password" 
                               name="password" 
                               value="{{ old('password') }}" 
                               placeholder="Kosongkan jika tidak ingin mengubah kata sandi" 
                               class="w-full px-4 py-2.5 bg-white border @error('password') border-red-400 @else border-gray-200 @enderror rounded-xl text-xs sm:text-sm text-[#1F1F1F] focus:outline-none focus:border-[#004ADA] focus:ring-1 focus:ring-[#004ADA]">
                        <p class="text-[11px] text-[#8E8E93] mt-1">
                            Minimal 8 karakter. Kosongkan jika ingin mempertahankan kata sandi saat ini (atau default ke <strong class="text-[#004ADA]">password123</strong> untuk akun baru).
                        </p>
                        @error('password')
                            <p class="text-[11px] text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Upload / Ganti Foto Pengurus -->
            <div class="pt-2">
                <label for="photo" class="block text-xs font-semibold text-[#1F1F1F] mb-1.5">
                    Foto pengurus
                </label>
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-2xl bg-slate-50 border border-gray-200/80 flex items-center justify-center p-1.5 shrink-0 overflow-hidden">
                        @if($pengurus->photo_url && file_exists(public_path($pengurus->photo_url)))
                            <img src="{{ asset($pengurus->photo_url) }}" alt="{{ $pengurus->name }}" class="w-full h-full object-cover rounded-xl">
                        @else
                            <img src="{{ asset('images/desainKMID/Hi-fi-design/Frame 1686560879.svg') }}" alt="KMID" class="w-8 h-8 object-contain">
                        @endif
                    </div>
                    <div class="flex-1">
                        <input type="file" 
                               id="photo" 
                               name="photo" 
                               accept="image/jpeg,image/png,image/jpg,image/webp,image/svg+xml" 
                               class="w-full text-xs text-[#707070] file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-[#004ADA] hover:file:bg-blue-100 cursor-pointer">
                        <p class="text-[11px] text-[#8E8E93] mt-1.5">Kosongkan jika tidak ingin mengubah foto. Format: JPG, PNG, WEBP, SVG (maks. 2 MB).</p>
                    </div>
                </div>
                @error('photo')
                    <p class="text-[11px] text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Bottom Row: Helper Note & Buttons -->
            <div class="pt-6 border-t border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <p class="text-[11px] text-[#8E8E93]">Perubahan yang disimpan akan langsung diperbarui di sistem.</p>
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.kepengurusan') }}" class="px-5 py-2.5 rounded-xl border border-gray-200 text-xs sm:text-sm font-medium text-[#707070] hover:text-[#1F1F1F] hover:bg-gray-50 transition-colors">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#004ADA] hover:bg-[#003bb0] text-xs sm:text-sm font-medium text-white shadow-[0_4px_14px_rgba(0,74,218,0.25)] transition-all">
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
