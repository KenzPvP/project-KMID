@php
    $isBerkasDiterima = $pendaftar && in_array($pendaftar->status, ['Lolos Berkas', 'Lolos Wawancara', 'Diterima']);
    $hasRegistered = !empty($pendaftar);
    $activeTab = request('tab', ($isBerkasDiterima ? 'wawancara' : 'pendaftaran'));

    // Tentukan langkah awal formulir pendaftaran
    $initialStep = 'a';
    if (isset($errors) && $errors->any()) {
        if ($errors->has('file_cv') || $errors->has('file_porto') || $errors->has('no_whatsapp')) {
            $initialStep = 'c';
        } elseif ($errors->has('divisi_pertama') || $errors->has('alasan_divisi_pertama') || $errors->has('divisi_kedua') || $errors->has('alasan_divisi_2')) {
            $initialStep = 'b';
        }
    } elseif (request('step') === 'c') {
        $initialStep = 'c';
    } elseif (request('step') === 'b') {
        $initialStep = 'b';
    }
@endphp
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Pendaftar KMID - Open Recruitment</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Custom scrollbar for clean dashboard view */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #F1F1F1;
        }
        ::-webkit-scrollbar-thumb {
            background: #D1D5DB;
            border-radius: 9999px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #9CA3AF;
        }
    </style>
</head>
<body class="antialiased text-[#1F1F1F] bg-[#FBFBFA] selection:bg-[#004ADA] selection:text-white font-['Plus_Jakarta_Sans',sans-serif] min-h-screen flex flex-col">

    <div class="flex-1 flex flex-col md:flex-row min-h-screen">
        
        <!-- ============================================================== -->
        <!-- SIDEBAR                                                        -->
        <!-- ============================================================== -->
        <aside id="sidebar" class="w-full md:w-64 lg:w-72 shrink-0 bg-white border-r border-[#EEEEEE] flex flex-col justify-between z-30 transition-all duration-300">
            <div>
                <!-- Top Brand Logo Area -->
                <div class="px-6 py-6 sm:py-7 border-b border-[#EEEEEE] flex items-center justify-between">
                    <div>
                        <a href="{{ route('home') }}" class="inline-block transition-transform hover:scale-105" aria-label="KMID Home">
                            <img src="{{ asset('images/desainKMID/Hi-fi-design/Frame 1686560881.svg') }}" alt="KMID Logo" class="h-9 lg:h-10 w-auto">
                        </a>
                        <!-- Orange Accent Line under Logo -->
                        <div class="w-12 h-1 bg-[#FEA515] rounded-full mt-2.5"></div>
                    </div>

                    <!-- Mobile close button -->
                    <button type="button" id="sidebar-close-btn" class="md:hidden p-2 text-gray-500 hover:text-[#1F1F1F]" aria-label="Close sidebar">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <!-- Navigation Links -->
                <nav class="p-4 space-y-2 mt-2">
                    <!-- Nav Item 1: Pendaftaran Oprec Staff KMID -->
                    <button type="button" id="nav-btn-pendaftaran" class="portal-nav-item w-full flex items-center justify-between px-3.5 py-3 rounded-xl transition-all duration-200 text-left group {{ $activeTab === 'pendaftaran' ? 'bg-[#EBF2FE] text-[#004ADA]' : 'text-[#707070] hover:bg-slate-50 hover:text-[#1F1F1F]' }}">
                        <div class="flex items-center gap-3">
                            <!-- Document / Paper Icon -->
                            <div class="w-5 h-5 shrink-0 flex items-center justify-center">
                                <svg class="w-5 h-5 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <span class="text-xs sm:text-sm font-semibold tracking-tight">Pendaftaran Oprec<br class="hidden sm:inline"> Staff KMID</span>
                        </div>
                        <!-- Active Indicator Bar -->
                        <div class="indicator-bar w-1.5 h-6 bg-[#004ADA] rounded-full {{ $activeTab === 'pendaftaran' ? '' : 'hidden' }}"></div>
                    </button>

                    <!-- Nav Item 2: Pengisian Jadwal Wawancara (Hanya muncul jika berkas sudah disetujui / di-ACC admin) -->
                    @if($isBerkasDiterima)
                    <button type="button" id="nav-btn-wawancara" class="portal-nav-item w-full flex items-center justify-between px-3.5 py-3 rounded-xl transition-all duration-200 text-left group {{ $activeTab === 'wawancara' ? 'bg-[#EBF2FE] text-[#004ADA]' : 'text-[#707070] hover:bg-slate-50 hover:text-[#1F1F1F]' }}">
                        <div class="flex items-center gap-3">
                            <!-- Calendar Icon -->
                            <div class="w-5 h-5 shrink-0 flex items-center justify-center">
                                <svg class="w-5 h-5 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <span class="text-xs sm:text-sm font-medium tracking-tight">Pengisian Jadwal<br class="hidden sm:inline"> Wawancara</span>
                        </div>
                        <!-- Active Indicator Bar -->
                        <div class="indicator-bar w-1.5 h-6 bg-[#004ADA] rounded-full {{ $activeTab === 'wawancara' ? '' : 'hidden' }}"></div>
                    </button>
                    @endif
                </nav>
            </div>

            <!-- Bottom Information -->
            <div class="p-6 border-t border-[#EEEEEE]">
                <p class="text-xs font-semibold text-[#1F1F1F]">Komunitas Mahasiswa Inovasi Digital</p>
                <p class="text-xs text-[#8E8E93] mt-0.5">Universitas Gadjah Mada</p>
            </div>
        </aside>

        <!-- ============================================================== -->
        <!-- MAIN CONTENT AREA WITH TOPBAR & BACKGROUND ORNAMENT            -->
        <!-- ============================================================== -->
        <div class="flex-1 flex flex-col min-w-0 min-h-screen relative overflow-hidden bg-[#FBFBFA]">
            
            <!-- TOP NAVBAR -->
            <header class="h-16 lg:h-18 bg-white border-b border-[#EEEEEE] flex items-center justify-between px-4 sm:px-8 lg:px-10 z-20 shrink-0">
                <!-- Left: Portal Title & Toggle Button -->
                <div class="flex items-center gap-3">
                    <button type="button" id="sidebar-toggle-btn" class="md:hidden p-1.5 rounded-lg text-gray-500 hover:text-gray-800 hover:bg-gray-100" aria-label="Toggle menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>

                    <!-- Icon [ | ] (Sidebar toggle / layout icon) -->
                    <div class="hidden sm:flex items-center text-[#707070]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <rect x="3" y="4" width="18" height="16" rx="2" stroke-width="1.8"/>
                            <path stroke-linecap="round" stroke-width="1.8" d="M9 4v16"/>
                        </svg>
                    </div>

                    <span class="text-xs sm:text-sm font-normal text-[#707070]">Portal pendaftar KMID</span>
                </div>

                <!-- Right: Notifications & Profile Details -->
                <div class="flex items-center gap-3 sm:gap-6">
                    <!-- Notification Bell -->
                    <button type="button" class="p-2 text-gray-400 hover:text-gray-600 transition-colors relative" aria-label="Notifikasi">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                    </button>

                    <!-- User Profile Item with Dropdown -->
                    <div class="relative">
                        <button type="button" id="profile-dropdown-btn" class="flex items-center gap-3 pl-2 sm:pl-3 border-l border-gray-100 hover:opacity-85 transition-opacity focus:outline-none cursor-pointer" aria-label="Menu profil">
                            <!-- Profile Avatar -->
                            <div class="w-8 sm:w-9 h-8 sm:h-9 rounded-full bg-[#004ADA] text-white font-bold flex items-center justify-center text-xs sm:text-sm shadow-sm select-none">
                                {{ strtoupper(substr(auth()->user()->name ?? 'P', 0, 1)) }}
                            </div>
                            <!-- Profile Texts -->
                            <div class="hidden sm:block text-left leading-tight">
                                <div class="text-xs sm:text-sm font-semibold text-[#1F1F1F]">{{ auth()->user()->name ?? 'Pendaftar KMID' }}</div>
                                <div class="text-[11px] text-[#9CA3AF]">
                                    @if(auth()->check() && auth()->user()->role === 'admin')
                                        Administrator
                                    @elseif(auth()->check() && auth()->user()->role === 'staff')
                                        Staff KMID
                                    @else
                                        Akun Mahasiswa (Pendaftar)
                                    @endif
                                </div>
                            </div>
                            <!-- Dropdown Chevron -->
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>

                        <!-- Profile Dropdown Panel -->
                        <div id="profile-dropdown-panel" class="hidden absolute right-0 mt-3 w-64 bg-white rounded-2xl shadow-xl border border-gray-100 py-2 z-50 divide-y divide-gray-100">
                            <div class="px-4 py-3">
                                <p class="text-xs font-semibold text-[#1F1F1F]">{{ auth()->user()->name ?? 'Pendaftar' }}</p>
                                <p class="text-[11px] text-[#8E8E93] truncate">{{ auth()->user()->email ?? '-' }}</p>
                                <div class="mt-2 inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-blue-50 text-[#004ADA]">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#004ADA]"></span>
                                    Role: {{ ucfirst(auth()->user()->role ?? 'pendaftar') }}
                                </div>
                            </div>
                            <div class="py-1">
                                <a href="{{ route('home') }}" class="block px-4 py-2 text-xs text-[#707070] hover:text-[#1F1F1F] hover:bg-slate-50 transition-colors">
                                    Kembali ke Beranda
                                </a>
                                @if(auth()->check() && (auth()->user()->role === 'admin' || auth()->user()->role === 'staff'))
                                    <a href="{{ auth()->user()->role === 'admin' ? route('admin.pendaftar.index') : route('staff.pendaftar.index') }}" class="block px-4 py-2 text-xs text-[#004ADA] hover:bg-blue-50 transition-colors font-semibold">
                                        Ke Dashboard Pengelolaan
                                    </a>
                                @endif
                                <a href="{{ route('logout') }}" class="block px-4 py-2 text-xs text-red-600 hover:bg-red-50 transition-colors font-medium">
                                    Keluar (Logout)
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- MAIN SCROLLABLE CONTENT BODY -->
            <main class="flex-1 relative overflow-y-auto px-4 sm:px-8 lg:px-12 py-8 lg:py-12 flex justify-center items-start">
                
                <!-- Background Ornament (exact from Figma ornamentBackground.png) -->
                <div class="absolute inset-0 pointer-events-none select-none z-0 overflow-hidden" aria-hidden="true">
                    <img src="{{ asset('images/desainKMID/Hi-fi-design/ornamentBackground.png') }}" alt="" class="w-full h-full object-cover object-top opacity-85">
                </div>

                <!-- ============================================================== -->
                <!-- SECTION 1: PENDAFTARAN OPREC STAFF KMID                        -->
                <!-- ============================================================== -->
                <section id="section-pendaftaran" class="portal-section w-full max-w-[880px] relative z-10 {{ $activeTab === 'pendaftaran' ? '' : 'hidden' }}">
                    <div class="bg-white rounded-[24px] sm:rounded-[28px] p-6 sm:p-10 lg:p-12 shadow-[0_10px_35px_rgba(0,0,0,0.03)] border border-gray-100/80">
                        
                        @if (session('success'))
                            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl flex items-center justify-between text-xs sm:text-sm">
                                <div class="flex items-center gap-2.5">
                                    <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <span class="font-semibold">{{ session('success') }}</span>
                                </div>
                            </div>
                        @endif

                        @if (isset($errors) && $errors->any())
                            <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-2xl text-xs sm:text-sm">
                                <p class="font-bold mb-1">Periksa kembali data yang dimasukkan:</p>
                                <ul class="list-disc list-inside space-y-0.5">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Form Header -->
                        <div class="mb-8">
                            <!-- Small Brand Tag -->
                            <div class="flex items-center gap-2 mb-2">
                                <svg class="w-4 h-4" viewBox="0 0 100 100" fill="none">
                                    <path d="M25 15h20v70H25z" fill="#004ADA"/>
                                    <path d="M45 40l25-25h25L65 45l30 40H70L45 50z" fill="#FEA515"/>
                                </svg>
                                <span class="text-xs font-bold text-[#004ADA] tracking-wide">KMID UGM</span>
                            </div>

                            <!-- Main Title -->
                            <h1 class="text-2xl sm:text-3xl lg:text-[34px] font-extrabold text-[#1F1F1F] tracking-tight">Open Recruitment KMID</h1>
                            <!-- Yellow Accent Bar -->
                            <div class="w-12 h-1 bg-[#FEA515] rounded-full mt-2 mb-3"></div>
                            <!-- Subtitle -->
                            <p class="text-xs sm:text-sm text-[#707070] leading-relaxed">Halo, calon anggota KMID! Lengkapi data diri, pilihan divisi, dan berkasmu melalui formulir di bawah ini.</p>

                            <!-- Status Tahapan Pendaftaran (Simple & Sleek) -->
                            @if ($isBerkasDiterima)
                                <div class="mt-5 p-3.5 sm:p-4 bg-emerald-50/80 border border-emerald-200/80 rounded-xl flex flex-col sm:flex-row sm:items-center justify-between gap-3 text-xs">
                                    <div class="flex items-center gap-2.5 text-emerald-950">
                                        <div class="w-5 h-5 rounded-full bg-emerald-500 text-white flex items-center justify-center shrink-0">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                            </svg>
                                        </div>
                                        <span>
                                            <strong class="font-bold">Berkas Disetujui (Lolos Berkas)!</strong> Menu wawancara telah dibuka. Silakan pilih jadwal wawancara Anda.
                                        </span>
                                    </div>
                                    <button type="button" onclick="switchSection('wawancara')" class="inline-flex items-center justify-center gap-1.5 px-3.5 py-1.5 bg-[#004ADA] hover:bg-[#003bb0] text-white font-semibold rounded-lg transition-colors shrink-0 shadow-xs cursor-pointer">
                                        <span>Isi Jadwal Wawancara</span>
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                    </button>
                                </div>
                            @elseif ($hasRegistered)
                                <div class="mt-5 p-3.5 sm:p-4 bg-amber-50/70 border border-amber-200/70 rounded-xl flex items-center justify-between gap-3 text-xs">
                                    <div class="flex items-center gap-2.5 text-amber-900">
                                        <svg class="w-4 h-4 text-amber-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span>
                                            <strong class="font-semibold text-amber-950">Berkas Terkirim:</strong> Menunggu peninjauan Admin. Bagian jadwal wawancara akan aktif setelah berkas di-ACC.
                                        </span>
                                    </div>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-amber-200/70 text-amber-900 shrink-0">
                                        Status: {{ $pendaftar->status ?? 'Mendaftar' }}
                                    </span>
                                </div>
                            @else
                                <div class="mt-5 p-3 sm:p-3.5 bg-blue-50/60 border border-blue-100 rounded-xl flex items-center gap-2.5 text-xs text-[#505050]">
                                    <svg class="w-4 h-4 text-[#004ADA] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>
                                        <strong class="font-semibold text-[#1F1F1F]">Catatan:</strong> Pastikan Anda mengisi data diri dan mengunggah berkas pendaftaran dengan benar dan teliti sebelum dikirimkan.
                                    </span>
                                </div>
                            @endif
                        </div>

                        <!-- Divider line -->
                        <hr class="border-[#F3F4F6] my-7">

                        <!-- Multi-step Form Content -->
                        <form id="form-oprec" action="{{ route('open-recruitment.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- ========================================== -->
                            <!-- STEP A: DATA DIRI                          -->
                            <!-- ========================================== -->
                            <div id="step-a" class="oprec-step {{ $initialStep === 'a' ? '' : 'hidden' }}">
                                <!-- Section Category Header -->
                                <div class="flex items-start gap-3.5 mb-6">
                                    <div class="w-8 h-8 rounded-lg bg-[#FEF4E6] text-[#FEA515] font-bold text-sm flex items-center justify-center shrink-0">
                                        A
                                    </div>
                                    <div>
                                        <h2 class="text-base font-semibold text-[#1F1F1F] leading-tight">Data diri</h2>
                                        <p class="text-xs text-[#707070] mt-0.5">Kenalkan dirimu dengan mengisi identitas mahasiswa.</p>
                                    </div>
                                </div>

                                <!-- Fields Container -->
                                <div class="space-y-5">
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                        <!-- Field 1: Nama Lengkap -->
                                        <div>
                                            <label for="nama_lengkap" class="block text-sm font-semibold text-[#1F1F1F] mb-2">1. Nama lengkap</label>
                                            <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap', $pendaftar->name ?? auth()->user()->name) }}" required placeholder="Masukkan nama lengkap" class="w-full px-4 py-3 bg-[#FBFBFA] border border-[#E5E7EB] rounded-xl text-sm text-[#1F1F1F] placeholder-[#9CA3AF] focus:outline-none focus:bg-white focus:border-[#004ADA] focus:ring-2 focus:ring-blue-100 transition-all">
                                        </div>

                                        <!-- Field 2: NIM -->
                                        <div>
                                            <label for="nim" class="block text-sm font-semibold text-[#1F1F1F] mb-2">2. NIM</label>
                                            <input type="text" id="nim" name="nim" value="{{ old('nim', $pendaftar->nim ?? '') }}" required placeholder="Format: 25/512345/SV/22345" class="w-full px-4 py-3 bg-[#FBFBFA] border border-[#E5E7EB] rounded-xl text-sm text-[#1F1F1F] placeholder-[#9CA3AF] focus:outline-none focus:bg-white focus:border-[#004ADA] focus:ring-2 focus:ring-blue-100 transition-all">
                                        </div>
                                    </div>

                                    <!-- Field 3: Asal Prodi -->
                                    <div>
                                        <label for="asal_prodi" class="block text-sm font-semibold text-[#1F1F1F] mb-2">3. Asal Prodi</label>
                                        <input type="text" id="asal_prodi" name="asal_prodi" value="{{ old('asal_prodi', $pendaftar->major ?? '') }}" required placeholder="Contoh: Teknologi Rekayasa Perangkat Lunak" class="w-full px-4 py-3 bg-[#FBFBFA] border border-[#E5E7EB] rounded-xl text-sm text-[#1F1F1F] placeholder-[#9CA3AF] focus:outline-none focus:bg-white focus:border-[#004ADA] focus:ring-2 focus:ring-blue-100 transition-all">
                                    </div>
                                </div>

                                <!-- Footer Action -->
                                <div class="mt-10 flex justify-end">
                                    <button type="button" id="btn-next-to-b" class="inline-flex items-center justify-center gap-2 px-7 py-3 bg-[#004ADA] hover:bg-[#003FBA] active:scale-[0.99] text-white font-semibold text-sm rounded-xl transition-all duration-200 shadow-md shadow-blue-600/20">
                                        <span>Selanjutnya</span>
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- ========================================== -->
                            <!-- STEP B: PILIHAN DIVISI                     -->
                            <!-- ========================================== -->
                            <div id="step-b" class="oprec-step {{ $initialStep === 'b' ? '' : 'hidden' }}">
                                <!-- Section Category Header -->
                                <div class="flex items-start gap-3.5 mb-6">
                                    <div class="w-8 h-8 rounded-lg bg-[#FEF4E6] text-[#FEA515] font-bold text-sm flex items-center justify-center shrink-0">
                                        B
                                    </div>
                                    <div>
                                        <h2 class="text-base font-semibold text-[#1F1F1F] leading-tight">Pilihan divisi</h2>
                                        <p class="text-xs text-[#707070] mt-0.5">Tentukan pilihan pertama dan kedua, lalu ceritakan alasanmu.</p>
                                    </div>
                                </div>

                                <div class="space-y-7">
                                    <!-- Field 4: Pilihan Divisi Pertama -->
                                    <div>
                                        <div class="mb-3">
                                            <label class="block text-sm font-semibold text-[#1F1F1F]">4. Pilihan Divisi Pertama</label>
                                            <p class="text-xs text-[#707070] mt-0.5">Pilih satu divisi yang kamu minati.</p>
                                        </div>

                                        <!-- Grid 2 Cols of 8 Divisions -->
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3" id="group-divisi-1">
                                            @php
                                                $divisiList = [
                                                    'Perlombaan',
                                                    'Humas & Publikasi',
                                                    'Media Creative',
                                                    'IPDP',
                                                    'ITDP',
                                                    'Poster Digital Pendidikan',
                                                    'MicroTeaching Digital Pendidikan',
                                                    'Video Digital Pendidikan',
                                                ];
                                                $selectedDivisi = old('divisi_pertama', $pendaftar->division ?? 'Media Creative');
                                            @endphp

                                            @foreach($divisiList as $index => $divisi)
                                                @php $isDivSelected = ($selectedDivisi === $divisi); @endphp
                                                <label class="division-card relative flex items-center gap-3 px-4 py-3 bg-[#FBFBFA] border {{ $isDivSelected ? 'border-[#004ADA] bg-blue-50/50' : 'border-[#E5E7EB]' }} rounded-xl cursor-pointer transition-all hover:bg-white select-none">
                                                    <input type="radio" name="divisi_pertama" value="{{ $divisi }}" class="sr-only division-radio" {{ $isDivSelected ? 'checked' : '' }}>
                                                    <span class="custom-radio-circle w-4 h-4 rounded-full border {{ $isDivSelected ? 'border-[#004ADA]' : 'border-gray-300' }} flex items-center justify-center shrink-0">
                                                        <span class="radio-dot w-2 h-2 rounded-full bg-[#004ADA] {{ $isDivSelected ? '' : 'hidden' }}"></span>
                                                    </span>
                                                    <span class="text-xs sm:text-sm font-medium text-[#1F1F1F] division-text">{{ $divisi }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Field 5: Alasan Memilih Divisi Pertama -->
                                    <div>
                                        <label for="alasan_divisi_pertama" class="block text-sm font-semibold text-[#1F1F1F] mb-2">5. Alasan Memilih Divisi Pertama</label>
                                        <textarea id="alasan_divisi_pertama" name="alasan_divisi_pertama" rows="3" placeholder="Ceritakan minat, pengalaman, dan alasanmu memilih divisi pertama." class="w-full px-4 py-3 bg-[#FBFBFA] border border-[#E5E7EB] rounded-xl text-sm text-[#1F1F1F] placeholder-[#9CA3AF] focus:outline-none focus:bg-white focus:border-[#004ADA] focus:ring-2 focus:ring-blue-100 transition-all resize-y">{{ old('alasan_divisi_pertama', $pendaftar->motivation ?? '') }}</textarea>
                                    </div>

                                    <!-- Field 6: Pilihan Kedua -->
                                    <div>
                                        <div class="mb-3">
                                            <label class="block text-sm font-semibold text-[#1F1F1F]">6. Pilihan Kedua</label>
                                            <p class="text-xs text-[#707070] mt-0.5">Pilih satu divisi yang kamu minati.</p>
                                        </div>

                                        <!-- Grid 2 Cols of 8 Divisions -->
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3" id="group-divisi-2">
                                            @foreach($divisiList as $index => $divisi)
                                                <label class="division-card relative flex items-center gap-3 px-4 py-3 bg-[#FBFBFA] border border-[#E5E7EB] rounded-xl cursor-pointer transition-all hover:bg-white select-none">
                                                    <input type="radio" name="divisi_kedua" value="{{ $divisi }}" class="sr-only division-radio">
                                                    <span class="custom-radio-circle w-4 h-4 rounded-full border border-gray-300 flex items-center justify-center shrink-0">
                                                        <span class="radio-dot w-2 h-2 rounded-full bg-[#004ADA] hidden"></span>
                                                    </span>
                                                    <span class="text-xs sm:text-sm font-medium text-[#1F1F1F] division-text">{{ $divisi }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Field 7: Alasan Memilih Divisi Kedua -->
                                    <div>
                                        <label for="alasan_divisi_2" class="block text-sm font-semibold text-[#1F1F1F] mb-2">7. Alasan Memilih Divisi Kedua</label>
                                        <textarea id="alasan_divisi_2" name="alasan_divisi_2" rows="3" placeholder="Ceritakan minat, pengalaman, dan alasanmu memilih divisi kedua." class="w-full px-4 py-3 bg-[#FBFBFA] border border-[#E5E7EB] rounded-xl text-sm text-[#1F1F1F] placeholder-[#9CA3AF] focus:outline-none focus:bg-white focus:border-[#004ADA] focus:ring-2 focus:ring-blue-100 transition-all resize-y"></textarea>
                                    </div>
                                </div>

                                <!-- Footer Action with Back & Next -->
                                <div class="mt-10 flex items-center justify-between gap-4">
                                    <button type="button" id="btn-back-to-a" class="inline-flex items-center justify-center gap-2 px-6 py-3 border border-[#E5E7EB] bg-white hover:bg-gray-50 text-[#555555] hover:text-[#1F1F1F] font-semibold text-sm rounded-xl transition-all duration-200 cursor-pointer">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                        </svg>
                                        <span>Kembali</span>
                                    </button>

                                    <button type="button" id="btn-next-to-c" class="inline-flex items-center justify-center gap-2 px-7 py-3 bg-[#004ADA] hover:bg-[#003FBA] active:scale-[0.99] text-white font-semibold text-sm rounded-xl transition-all duration-200 shadow-md shadow-blue-600/20 cursor-pointer">
                                        <span>Selanjutnya</span>
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- ========================================== -->
                            <!-- STEP C: BERKAS & KONTAK                    -->
                            <!-- ========================================== -->
                            <div id="step-c" class="oprec-step {{ $initialStep === 'c' ? '' : 'hidden' }}">
                                <!-- Section Category Header -->
                                <div class="flex items-start gap-3.5 mb-6">
                                    <div class="w-8 h-8 rounded-lg bg-[#FEF4E6] text-[#FEA515] font-bold text-sm flex items-center justify-center shrink-0">
                                        C
                                    </div>
                                    <div>
                                        <h2 class="text-base font-semibold text-[#1F1F1F] leading-tight">Berkas &amp; kontak</h2>
                                        <p class="text-xs text-[#707070] mt-0.5">Lampirkan berkasmu dan nomor WhatsApp yang bisa dihubungi.</p>
                                    </div>
                                </div>

                                <div class="space-y-6">
                                    <!-- Field 8: Upload CV -->
                                    <div>
                                        <div class="flex items-center justify-between mb-2">
                                            <label class="block text-sm font-semibold text-[#1F1F1F]">8. Upload CV <span class="text-red-500">*</span></label>
                                            <span class="text-[11px] text-[#707070]">PDF / DOC / DOCX (Maks. 10MB)</span>
                                        </div>
                                        <div id="cv-dropzone" class="border border-dashed border-[#CBD5E1] rounded-2xl p-6 sm:p-7 bg-[#F8FAFC]/50 hover:bg-blue-50/20 hover:border-[#004ADA] transition-all cursor-pointer text-center relative group">
                                            <input type="file" id="file_cv" name="file_cv" class="sr-only" accept=".pdf,.doc,.docx" {{ $hasRegistered && !empty($pendaftar->cv_url) ? '' : 'required' }}>
                                            <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                                                <div class="w-10 h-10 rounded-full bg-blue-50 text-[#004ADA] flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                                    </svg>
                                                </div>
                                                <div class="text-center sm:text-left">
                                                    <p class="text-xs sm:text-sm text-[#1F1F1F]">
                                                        <span class="text-[#004ADA] font-semibold underline decoration-blue-200">Klik untuk upload</span> atau seret berkas ke sini
                                                    </p>
                                                    @if($hasRegistered && !empty($pendaftar->cv_url))
                                                        <p id="cv-filename" class="text-xs text-emerald-600 font-semibold mt-0.5 flex items-center justify-center sm:justify-start gap-1">
                                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                                            <span>Berkas tersimpan: <a href="{{ asset($pendaftar->cv_url) }}" target="_blank" class="underline hover:text-emerald-800" onclick="event.stopPropagation()">{{ basename($pendaftar->cv_url) }}</a></span>
                                                        </p>
                                                        <p class="text-[11px] text-[#9CA3AF] mt-0.5">Unggah berkas baru hanya jika ingin menggantinya.</p>
                                                    @else
                                                        <p id="cv-filename" class="text-xs text-[#9CA3AF] mt-0.5">Belum ada berkas dipilih</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @error('file_cv')
                                            <p class="text-xs text-red-600 mt-1.5 font-medium">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Field 9: Upload Portofolio -->
                                    <div>
                                        <div class="flex items-center justify-between mb-2">
                                            <div>
                                                <label class="block text-sm font-semibold text-[#1F1F1F]">9. Upload Portofolio</label>
                                                <p class="text-xs text-[#707070] mt-0.5">Dikhususkan bagi yang memilih divisi Media Creative (Opsional untuk divisi lain).</p>
                                            </div>
                                            <span class="text-[11px] text-[#707070] text-right">PDF / ZIP / RAR / Gambar (Maks. 20MB)</span>
                                        </div>
                                        <div id="porto-dropzone" class="border border-dashed border-[#CBD5E1] rounded-2xl p-6 sm:p-7 bg-[#F8FAFC]/50 hover:bg-blue-50/20 hover:border-[#004ADA] transition-all cursor-pointer text-center relative group">
                                            <input type="file" id="file_porto" name="file_porto" class="sr-only" accept=".pdf,.zip,.rar,.png,.jpg,.jpeg">
                                            <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                                                <div class="w-10 h-10 rounded-full bg-blue-50 text-[#004ADA] flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                                    </svg>
                                                </div>
                                                <div class="text-center sm:text-left">
                                                    <p class="text-xs sm:text-sm text-[#1F1F1F]">
                                                        <span class="text-[#004ADA] font-semibold underline decoration-blue-200">Klik untuk upload</span> atau seret berkas ke sini
                                                    </p>
                                                    @if($hasRegistered && !empty($pendaftar->portfolio_url))
                                                        <p id="porto-filename" class="text-xs text-emerald-600 font-semibold mt-0.5 flex items-center justify-center sm:justify-start gap-1">
                                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                                            <span>Berkas tersimpan: <a href="{{ asset($pendaftar->portfolio_url) }}" target="_blank" class="underline hover:text-emerald-800" onclick="event.stopPropagation()">{{ basename($pendaftar->portfolio_url) }}</a></span>
                                                        </p>
                                                        <p class="text-[11px] text-[#9CA3AF] mt-0.5">Unggah berkas baru hanya jika ingin menggantinya.</p>
                                                    @else
                                                        <p id="porto-filename" class="text-xs text-[#9CA3AF] mt-0.5">Belum ada berkas dipilih</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @error('file_porto')
                                            <p class="text-xs text-red-600 mt-1.5 font-medium">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Field 10: Nomor WhatsApp -->
                                    <div>
                                        <label for="no_whatsapp" class="block text-sm font-semibold text-[#1F1F1F] mb-2">10. Nomor WhatsApp <span class="text-red-500">*</span></label>
                                        <input type="tel" id="no_whatsapp" name="no_whatsapp" value="{{ old('no_whatsapp', $pendaftar->phone_number ?? '') }}" required placeholder="Contoh: 0812-3456-7890" class="w-full px-4 py-3 bg-[#FBFBFA] border border-[#E5E7EB] rounded-xl text-sm text-[#1F1F1F] placeholder-[#9CA3AF] focus:outline-none focus:bg-white focus:border-[#004ADA] focus:ring-2 focus:ring-blue-100 transition-all">
                                        @error('no_whatsapp')
                                            <p class="text-xs text-red-600 mt-1.5 font-medium">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Footer Action with Note -->
                                <div class="mt-10 pt-4 flex flex-col sm:flex-row items-center justify-between gap-4 border-t border-[#F3F4F6]">
                                    <p class="text-xs text-[#707070] text-center sm:text-left">Pastikan data dan berkasmu sudah sesuai sebelum mengirim pendaftaran.</p>
                                    
                                    <div class="flex flex-col-reverse sm:flex-row items-center gap-3 w-full sm:w-auto">
                                        <button type="button" id="btn-back-to-b" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 border border-[#E5E7EB] bg-white hover:bg-gray-50 text-[#555555] hover:text-[#1F1F1F] font-semibold text-sm rounded-xl transition-all duration-200 cursor-pointer">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                            </svg>
                                            <span>Kembali</span>
                                        </button>

                                        <button type="submit" id="btn-submit-pendaftaran" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-7 py-3 bg-[#004ADA] hover:bg-[#003FBA] active:scale-[0.99] text-white font-semibold text-sm rounded-xl transition-all duration-200 shadow-md shadow-blue-600/20 cursor-pointer">
                                            <span>{{ $hasRegistered ? 'Simpan & Perbarui Berkas' : 'Kirim Pendaftaran' }}</span>
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>

                <!-- ============================================================== -->
                <!-- SECTION 2: PENGISIAN JADWAL WAWANCARA                          -->
                <!-- ============================================================== -->
                @if($isBerkasDiterima)
                <section id="section-wawancara" class="portal-section w-full max-w-[880px] relative z-10 {{ $activeTab === 'wawancara' ? '' : 'hidden' }}">
                    <div class="bg-white rounded-[24px] sm:rounded-[28px] p-6 sm:p-10 lg:p-12 shadow-[0_10px_35px_rgba(0,0,0,0.03)] border border-gray-100/80">
                        
                        <!-- Top Navigation Back Button -->
                        <div class="mb-5">
                            <button type="button" onclick="switchSection('pendaftaran')" class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-lg border border-gray-200 bg-white hover:bg-gray-50 text-xs font-semibold text-[#555555] hover:text-[#004ADA] transition-colors cursor-pointer group shadow-2xs">
                                <svg class="w-3.5 h-3.5 transition-transform group-hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                </svg>
                                <span>Kembali ke Formulir Berkas</span>
                            </button>
                        </div>

                        <!-- Form Header -->
                        <div class="mb-8">
                            <!-- Small Brand Tag -->
                            <div class="flex items-center gap-2 mb-2">
                                <svg class="w-4 h-4" viewBox="0 0 100 100" fill="none">
                                    <path d="M25 15h20v70H25z" fill="#004ADA"/>
                                    <path d="M45 40l25-25h25L65 45l30 40H70L45 50z" fill="#FEA515"/>
                                </svg>
                                <span class="text-xs font-bold text-[#004ADA] tracking-wide">KMID UGM</span>
                            </div>

                            <!-- Main Title -->
                            <h1 class="text-2xl sm:text-3xl lg:text-[34px] font-extrabold text-[#1F1F1F] tracking-tight">Jadwal Wawancara</h1>
                            <!-- Yellow Accent Bar -->
                            <div class="w-12 h-1 bg-[#FEA515] rounded-full mt-2 mb-3"></div>
                            <!-- Subtitle -->
                            <p class="text-xs sm:text-sm text-[#707070] leading-relaxed">Halo, calon anggota KMID! Tentukan Sesi Wawancaramu melalui formulir di bawah ini.</p>
                        </div>

                        @if(!empty($pendaftar->interview_time))
                            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-2xl flex items-center gap-3">
                                <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <div class="text-xs sm:text-sm text-emerald-950">
                                    <p class="font-bold">Jadwal Wawancara Terkonfirmasi:</p>
                                    <p class="text-emerald-800">{{ $pendaftar->interview_date ?? '8 - 10 Oktober 2026' }} · Sesi <strong>{{ $pendaftar->interview_time }} WIB</strong></p>
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('open-recruitment.jadwal') }}" method="POST">
                            @csrf

                            <!-- Divider line -->
                            <hr class="border-[#F3F4F6] my-7">

                            <!-- Data Pendaftar (Read-only) -->
                            <div class="mb-8">
                                <div class="flex items-center justify-between mb-4">
                                    <h2 class="text-base font-semibold text-[#1F1F1F]">Data pendaftar</h2>
                                    <span class="inline-flex items-center gap-1 text-xs text-[#9CA3AF] bg-gray-50 border border-gray-200 px-2.5 py-1 rounded-md">
                                        <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                        </svg>
                                        <span>Read-only</span>
                                    </span>
                                </div>

                                <div class="space-y-4">
                                    <!-- 1. Nama Lengkap -->
                                    <div>
                                        <label class="block text-sm font-semibold text-[#1F1F1F] mb-1.5">1. Nama Lengkap</label>
                                        <input type="text" value="{{ $pendaftar->name ?? auth()->user()->name }}" disabled readonly class="w-full px-4 py-3 bg-[#ECECEC] border border-transparent rounded-xl text-sm text-[#555555] font-medium cursor-not-allowed select-none">
                                    </div>

                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <!-- 2. Divisi yang Lolos -->
                                        <div>
                                            <label class="block text-sm font-semibold text-[#1F1F1F] mb-1.5">2. Divisi yang Lolos</label>
                                            <input type="text" value="{{ $pendaftar->division ?? 'Media Creative' }}" disabled readonly class="w-full px-4 py-3 bg-[#ECECEC] border border-transparent rounded-xl text-sm text-[#555555] font-medium cursor-not-allowed select-none">
                                        </div>

                                        <!-- 3. Hari Wawancara -->
                                        <div>
                                            <label class="block text-sm font-semibold text-[#1F1F1F] mb-1.5">3. Hari Wawancara</label>
                                            <input type="text" id="input_hari_wawancara" name="tanggal_wawancara" value="{{ $pendaftar->interview_date ?? 'Pilih sesi di bawah' }}" disabled readonly class="w-full px-4 py-3 bg-[#ECECEC] border border-transparent rounded-xl text-sm text-[#555555] font-medium cursor-not-allowed select-none">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 4. Jam Wawancara -->
                            <div class="pt-2">
                                <div class="flex items-start gap-3 mb-4">
                                    <div class="w-7 h-7 rounded-full bg-amber-50 text-[#FEA515] flex items-center justify-center shrink-0 mt-0.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-sm font-semibold text-[#1F1F1F]">4. Jam Wawancara</h3>
                                        <p class="text-xs text-[#707070] mt-0.5">Pilih satu sesi wawancara. Durasi setiap sesi 15 menit.</p>
                                    </div>
                                </div>

                                <!-- Sesi Jam Wawancara Cards -->
                                @php
                                    $currentSesi = $pendaftar->interview_time ?? '';
                                    $hasCustomSlots = isset($availableSlots) && $availableSlots->count() > 0;
                                @endphp

                                <input type="hidden" name="jadwal_id" id="selected_jadwal_id" value="">

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3" id="group-sesi-wawancara">
                                    @if($hasCustomSlots)
                                        @foreach($availableSlots as $slot)
                                            @php
                                                $slotTimeLabel = $slot->jam_range;
                                                $isSelected = ($currentSesi === $slotTimeLabel || ($pendaftar && $pendaftar->id === $slot->pendaftar_id));
                                            @endphp
                                            <label class="sesi-card relative flex items-center gap-3 px-4 py-3.5 rounded-xl cursor-pointer transition-all select-none border {{ $isSelected ? 'border-[#004ADA] bg-[#EBF2FE]' : 'border-[#E5E7EB] bg-[#FBFBFA] hover:bg-white' }}">
                                                <input type="radio" name="jam_wawancara" value="{{ $slotTimeLabel }}" data-jadwal-id="{{ $slot->id }}" data-tanggal="{{ $slot->tanggal_pendek }}" class="sr-only sesi-radio" {{ $isSelected ? 'checked' : '' }}>
                                                <span class="custom-radio-circle w-4 h-4 rounded-full border {{ $isSelected ? 'border-[#004ADA]' : 'border-gray-300' }} flex items-center justify-center shrink-0">
                                                    <span class="radio-dot w-2 h-2 rounded-full bg-[#004ADA] {{ $isSelected ? '' : 'hidden' }}"></span>
                                                </span>
                                                <div class="flex-1 min-w-0">
                                                    <div class="text-xs sm:text-sm font-semibold {{ $isSelected ? 'text-[#004ADA]' : 'text-[#1F1F1F]' }} sesi-time">{{ $slotTimeLabel }}</div>
                                                    <div class="text-[11px] text-[#707070] flex items-center gap-2 mt-0.5">
                                                        <span>{{ $slot->tanggal_pendek }}</span>
                                                        <span>·</span>
                                                        <span class="font-medium text-[#004ADA]">{{ $slot->mode }}</span>
                                                    </div>
                                                </div>
                                            </label>
                                        @endforeach
                                    @else
                                        @php
                                            $sesiList = [
                                                ['time' => '10.00-10.15 WIB', 'duration' => '15 menit'],
                                                ['time' => '10.15-10.30 WIB', 'duration' => '15 menit'],
                                                ['time' => '10.30-10.45 WIB', 'duration' => '15 menit'],
                                                ['time' => '10.45-11.00 WIB', 'duration' => '15 menit'],
                                                ['time' => '11.00-11.15 WIB', 'duration' => '15 menit'],
                                                ['time' => '11.15-11.30 WIB', 'duration' => '15 menit'],
                                            ];
                                        @endphp
                                        @foreach($sesiList as $sesi)
                                            @php $isSelected = ($currentSesi === $sesi['time']); @endphp
                                            <label class="sesi-card relative flex items-center gap-3 px-4 py-3.5 rounded-xl cursor-pointer transition-all select-none border {{ $isSelected ? 'border-[#004ADA] bg-[#EBF2FE]' : 'border-[#E5E7EB] bg-[#FBFBFA] hover:bg-white' }}">
                                                <input type="radio" name="jam_wawancara" value="{{ $sesi['time'] }}" class="sr-only sesi-radio" {{ $isSelected ? 'checked' : '' }}>
                                                <span class="custom-radio-circle w-4 h-4 rounded-full border {{ $isSelected ? 'border-[#004ADA]' : 'border-gray-300' }} flex items-center justify-center shrink-0">
                                                    <span class="radio-dot w-2 h-2 rounded-full bg-[#004ADA] {{ $isSelected ? '' : 'hidden' }}"></span>
                                                </span>
                                                <div>
                                                    <div class="text-xs sm:text-sm font-semibold {{ $isSelected ? 'text-[#004ADA]' : 'text-[#1F1F1F]' }} sesi-time">{{ $sesi['time'] }}</div>
                                                    <div class="text-[11px] text-[#9CA3AF]">{{ $sesi['duration'] }}</div>
                                                </div>
                                            </label>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <!-- Footer Action with Note -->
                            <div class="mt-10 pt-4 flex flex-col sm:flex-row items-center justify-between gap-4 border-t border-[#F3F4F6]">
                                <p class="text-xs text-[#707070] text-center sm:text-left">Pastikan sesi yang dipilih sudah sesuai sebelum mengirim jadwal wawancara.</p>
                                
                                <div class="flex flex-col-reverse sm:flex-row items-center gap-3 w-full sm:w-auto">
                                    <button type="button" onclick="switchSection('pendaftaran')" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 border border-[#E5E7EB] bg-white hover:bg-gray-50 text-[#555555] hover:text-[#1F1F1F] font-semibold text-sm rounded-xl transition-all duration-200 cursor-pointer shadow-xs">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                        </svg>
                                        <span>Kembali</span>
                                    </button>

                                    <button type="submit" id="btn-submit-wawancara" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-7 py-3 bg-[#004ADA] hover:bg-[#003FBA] active:scale-[0.99] text-white font-semibold text-sm rounded-xl transition-all duration-200 shadow-md shadow-blue-600/20 cursor-pointer">
                                        <span>Konfirmasi Jadwal Wawancara</span>
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
                @endif

            </main>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- INTERACTIVE SCRIPT FOR MULTI-STEP PORTAL NAVIGATION            -->
    <!-- ============================================================== -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Sidebar Navigation Toggles
            const navBtnPendaftaran = document.getElementById('nav-btn-pendaftaran');
            const navBtnWawancara = document.getElementById('nav-btn-wawancara');
            const sectionPendaftaran = document.getElementById('section-pendaftaran');
            const sectionWawancara = document.getElementById('section-wawancara');

            window.switchSection = function(target) {
                if (target === 'wawancara' && navBtnWawancara && sectionWawancara) {
                    navBtnWawancara.classList.remove('text-[#707070]', 'hover:bg-slate-50', 'hover:text-[#1F1F1F]');
                    navBtnWawancara.classList.add('bg-[#EBF2FE]', 'text-[#004ADA]');
                    navBtnWawancara.querySelector('.indicator-bar')?.classList.remove('hidden');

                    if (navBtnPendaftaran) {
                        navBtnPendaftaran.classList.remove('bg-[#EBF2FE]', 'text-[#004ADA]');
                        navBtnPendaftaran.classList.add('text-[#707070]', 'hover:bg-slate-50', 'hover:text-[#1F1F1F]');
                        navBtnPendaftaran.querySelector('.indicator-bar')?.classList.add('hidden');
                    }

                    if (sectionPendaftaran) sectionPendaftaran.classList.add('hidden');
                    sectionWawancara.classList.remove('hidden');
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                } else if (sectionPendaftaran) {
                    if (navBtnPendaftaran) {
                        navBtnPendaftaran.classList.remove('text-[#707070]', 'hover:bg-slate-50', 'hover:text-[#1F1F1F]');
                        navBtnPendaftaran.classList.add('bg-[#EBF2FE]', 'text-[#004ADA]');
                        navBtnPendaftaran.querySelector('.indicator-bar')?.classList.remove('hidden');
                    }

                    if (navBtnWawancara) {
                        navBtnWawancara.classList.remove('bg-[#EBF2FE]', 'text-[#004ADA]');
                        navBtnWawancara.classList.add('text-[#707070]', 'hover:bg-slate-50', 'hover:text-[#1F1F1F]');
                        navBtnWawancara.querySelector('.indicator-bar')?.classList.add('hidden');
                    }

                    if (sectionWawancara) sectionWawancara.classList.add('hidden');
                    sectionPendaftaran.classList.remove('hidden');
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                }
            };

            if (navBtnPendaftaran) {
                navBtnPendaftaran.addEventListener('click', () => window.switchSection('pendaftaran'));
            }
            if (navBtnWawancara) {
                navBtnWawancara.addEventListener('click', () => window.switchSection('wawancara'));
            }

            // Step Elements
            const stepA = document.getElementById('step-a');
            const stepB = document.getElementById('step-b');
            const stepC = document.getElementById('step-c');

            // Check URL Params
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('tab') === 'wawancara' && navBtnWawancara) {
                window.switchSection('wawancara');
            } else if (urlParams.get('tab') === 'pendaftaran' && navBtnPendaftaran) {
                window.switchSection('pendaftaran');
            } else if (urlParams.get('step') === 'b') {
                stepA?.classList.add('hidden');
                stepB?.classList.remove('hidden');
            } else if (urlParams.get('step') === 'c') {
                stepA?.classList.add('hidden');
                stepB?.classList.add('hidden');
                stepC?.classList.remove('hidden');
            }

            @if($hasRegistered && !$isBerkasDiterima)
            // Realtime polling untuk mendeteksi persetujuan (ACC) berkas oleh Admin secara instan
            const checkStatusInterval = setInterval(() => {
                fetch("{{ route('open-recruitment.check-status') }}", {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data && data.isBerkasDiterima) {
                        clearInterval(checkStatusInterval);
                        // Langsung alihkan ke halaman jadwal wawancara seketika di-ACC Admin
                        window.location.href = "{{ route('open-recruitment', ['tab' => 'wawancara']) }}";
                    }
                })
                .catch(() => {});
            }, 3000);
            @endif

            // Mobile Sidebar Drawer Toggle
            const sidebar = document.getElementById('sidebar');
            const sidebarToggleBtn = document.getElementById('sidebar-toggle-btn');
            const sidebarCloseBtn = document.getElementById('sidebar-close-btn');

            if (sidebarToggleBtn && sidebar) {
                sidebarToggleBtn.addEventListener('click', () => {
                    sidebar.classList.toggle('hidden');
                    sidebar.classList.toggle('fixed');
                    sidebar.classList.toggle('inset-0');
                });
            }
            if (sidebarCloseBtn && sidebar) {
                sidebarCloseBtn.addEventListener('click', () => {
                    sidebar.classList.add('hidden');
                    sidebar.classList.remove('fixed', 'inset-0');
                });
            }

            // Step Navigation Buttons
            const btnNextToB = document.getElementById('btn-next-to-b');
            const btnBackToA = document.getElementById('btn-back-to-a');
            const btnNextToC = document.getElementById('btn-next-to-c');
            const btnBackToB = document.getElementById('btn-back-to-b');

            btnNextToB?.addEventListener('click', () => {
                const nama = document.getElementById('nama_lengkap')?.value.trim();
                const nim = document.getElementById('nim')?.value.trim();
                const prodi = document.getElementById('asal_prodi')?.value.trim();
                if (!nama || !nim || !prodi) {
                    alert('Mohon lengkapi Nama Lengkap, NIM, dan Asal Prodi terlebih dahulu.');
                    return;
                }
                stepA?.classList.add('hidden');
                stepB?.classList.remove('hidden');
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });

            btnBackToA?.addEventListener('click', () => {
                stepB?.classList.add('hidden');
                stepA?.classList.remove('hidden');
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });

            btnNextToC?.addEventListener('click', () => {
                const divisi = document.querySelector('input[name="divisi_pertama"]:checked');
                if (!divisi) {
                    alert('Mohon pilih salah satu Divisi Pertama.');
                    return;
                }
                stepB?.classList.add('hidden');
                stepC?.classList.remove('hidden');
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });

            btnBackToB?.addEventListener('click', () => {
                stepC?.classList.add('hidden');
                stepB?.classList.remove('hidden');
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });

            // Division Selection Cards Style Sync
            function setupDivisionGroup(groupId) {
                const group = document.getElementById(groupId);
                if (!group) return;

                const cards = group.querySelectorAll('.division-card');
                cards.forEach(card => {
                    const input = card.querySelector('input[type="radio"]');
                    const dot = card.querySelector('.radio-dot');
                    const circle = card.querySelector('.custom-radio-circle');
                    const text = card.querySelector('.division-text');

                    function updateState() {
                        cards.forEach(c => {
                            c.classList.remove('border-[#004ADA]', 'bg-blue-50/50');
                            c.classList.add('border-[#E5E7EB]', 'bg-[#FBFBFA]');
                            c.querySelector('.radio-dot').classList.add('hidden');
                            c.querySelector('.custom-radio-circle').classList.remove('border-[#004ADA]');
                            c.querySelector('.custom-radio-circle').classList.add('border-gray-300');
                        });
                        card.classList.add('border-[#004ADA]', 'bg-blue-50/50');
                        card.classList.remove('border-[#E5E7EB]', 'bg-[#FBFBFA]');
                        dot.classList.remove('hidden');
                        circle.classList.add('border-[#004ADA]');
                        circle.classList.remove('border-gray-300');
                    }

                    if (input.checked) {
                        updateState();
                    }

                    card.addEventListener('click', () => {
                        input.checked = true;
                        updateState();
                    });
                });
            }

            setupDivisionGroup('group-divisi-1');
            setupDivisionGroup('group-divisi-2');

            // Interview Sesi Cards Style Sync
            const sesiCards = document.querySelectorAll('.sesi-card');
            sesiCards.forEach(card => {
                const input = card.querySelector('.sesi-radio');
                card.addEventListener('click', () => {
                    sesiCards.forEach(c => {
                        c.classList.remove('border-[#004ADA]', 'bg-[#EBF2FE]');
                        c.classList.add('border-[#E5E7EB]', 'bg-[#FBFBFA]');
                        c.querySelector('.radio-dot').classList.add('hidden');
                        c.querySelector('.custom-radio-circle').classList.remove('border-[#004ADA]');
                        c.querySelector('.custom-radio-circle').classList.add('border-gray-300');
                        c.querySelector('.sesi-time').classList.remove('text-[#004ADA]');
                        c.querySelector('.sesi-time').classList.add('text-[#1F1F1F]');
                    });

                    input.checked = true;
                    const hiddenIdInput = document.getElementById('selected_jadwal_id');
                    if (hiddenIdInput && input.dataset.jadwalId) {
                        hiddenIdInput.value = input.dataset.jadwalId;
                    }
                    const inputHari = document.getElementById('input_hari_wawancara');
                    if (inputHari && input.dataset.tanggal) {
                        inputHari.value = input.dataset.tanggal;
                    }
                    card.classList.add('border-[#004ADA]', 'bg-[#EBF2FE]');
                    card.classList.remove('border-[#E5E7EB]', 'bg-[#FBFBFA]');
                    card.querySelector('.radio-dot').classList.remove('hidden');
                    card.querySelector('.custom-radio-circle').classList.add('border-[#004ADA]');
                    card.querySelector('.custom-radio-circle').classList.remove('border-gray-300');
                    card.querySelector('.sesi-time').classList.add('text-[#004ADA]');
                    card.querySelector('.sesi-time').classList.remove('text-[#1F1F1F]');
                });
            });

            // File Upload Dropzones
            function setupDropzone(dropzoneId, inputId, labelId, maxMB, allowedExts) {
                const dropzone = document.getElementById(dropzoneId);
                const input = document.getElementById(inputId);
                const label = document.getElementById(labelId);

                if (!dropzone || !input || !label) return;

                // Stop propagation on input click to prevent double dialog popup
                input.addEventListener('click', (e) => e.stopPropagation());

                dropzone.addEventListener('click', () => input.click());

                function handleFile(file) {
                    if (!file) return false;

                    // Extension check
                    const parts = file.name.split('.');
                    const ext = parts.length > 1 ? parts.pop().toLowerCase() : '';
                    if (allowedExts && allowedExts.length && !allowedExts.includes(ext)) {
                        alert(`Format berkas "${file.name}" tidak didukung.\nFormat yang diperbolehkan: ${allowedExts.join(', ').toUpperCase()}`);
                        input.value = '';
                        return false;
                    }

                    // Size check
                    const maxBytes = maxMB * 1024 * 1024;
                    if (file.size > maxBytes) {
                        alert(`Ukuran berkas "${file.name}" terlalu besar (${(file.size / (1024 * 1024)).toFixed(2)} MB).\nBatas maksimum adalah ${maxMB} MB.`);
                        input.value = '';
                        return false;
                    }

                    const sizeStr = file.size > 1024 * 1024 
                        ? (file.size / (1024 * 1024)).toFixed(2) + ' MB'
                        : (file.size / 1024).toFixed(1) + ' KB';

                    label.innerHTML = `<span class="inline-flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-blue-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg><span class="break-all font-semibold text-[#004ADA]">${file.name} (${sizeStr})</span></span>`;
                    label.classList.remove('text-[#9CA3AF]');
                    return true;
                }

                input.addEventListener('change', () => {
                    if (input.files && input.files[0]) {
                        handleFile(input.files[0]);
                    }
                });

                ['dragenter', 'dragover'].forEach(eventName => {
                    dropzone.addEventListener(eventName, (e) => {
                        e.preventDefault();
                        e.stopPropagation();
                        dropzone.classList.add('border-[#004ADA]', 'bg-blue-50/30');
                    });
                });

                ['dragleave', 'drop'].forEach(eventName => {
                    dropzone.addEventListener(eventName, (e) => {
                        e.preventDefault();
                        e.stopPropagation();
                        dropzone.classList.remove('border-[#004ADA]', 'bg-blue-50/30');
                    });
                });

                dropzone.addEventListener('drop', (e) => {
                    if (e.dataTransfer.files && e.dataTransfer.files[0]) {
                        const file = e.dataTransfer.files[0];
                        if (handleFile(file)) {
                            input.files = e.dataTransfer.files;
                        }
                    }
                });
            }

            setupDropzone('cv-dropzone', 'file_cv', 'cv-filename', 10, ['pdf', 'doc', 'docx']);
            setupDropzone('porto-dropzone', 'file_porto', 'porto-filename', 20, ['pdf', 'zip', 'rar', 'png', 'jpg', 'jpeg']);

            // Form Submit Loading Feedback
            const formOprec = document.getElementById('form-oprec');
            const btnSubmit = document.getElementById('btn-submit-pendaftaran');
            if (formOprec && btnSubmit) {
                formOprec.addEventListener('submit', () => {
                    btnSubmit.disabled = true;
                    btnSubmit.classList.add('opacity-75', 'cursor-not-allowed');
                    btnSubmit.innerHTML = `
                        <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline-block" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span>Mengunggah Berkas...</span>
                    `;
                });
            }

            // Profile Dropdown Toggle
            const profileBtn = document.getElementById('profile-dropdown-btn');
            const profilePanel = document.getElementById('profile-dropdown-panel');
            if (profileBtn && profilePanel) {
                profileBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    profilePanel.classList.toggle('hidden');
                });
                document.addEventListener('click', (e) => {
                    if (!profilePanel.contains(e.target) && !profileBtn.contains(e.target)) {
                        profilePanel.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</body>
</html>
