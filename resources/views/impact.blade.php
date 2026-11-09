<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Impact | KMID - Komunitas Mahasiswa Inovasi Digital</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased text-[#1F1F1F] bg-white selection:bg-[#004ADA] selection:text-white">

    <!-- SITE HEADER / NAVBAR -->
    @include('layouts.navbar')

    <main>
        {{-- ============================================= --}}
        {{-- SECTION 1: HERO SECTION                       --}}
        {{-- ============================================= --}}
        <section id="home" class="relative pt-36 pb-24 sm:pt-44 sm:pb-32 overflow-hidden hero-bg-pattern">
            <img src="{{ asset('images/desainKMID/Hi-fi-design/Rectangle 2762.svg') }}" alt="" aria-hidden="true" class="home-rectangle-ornament">
            <img src="{{ asset('images/desainKMID/Hi-fi-design/Rectangle 2762.svg') }}" alt="" aria-hidden="true" class="home-rectangle-ornament home-rectangle-ornament-right">
            <!-- Decorative Starburst Glows -->
            <div class="absolute -top-10 -left-10 w-80 sm:w-96 h-80 sm:h-96 bg-[#FEA515]/25 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute top-1/2 -right-16 w-80 sm:w-96 h-80 sm:h-96 bg-[#FEA515]/20 rounded-full blur-3xl pointer-events-none"></div>

             <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 reveal-on-scroll">
                <!-- Main Headline -->
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-[68px] font-extrabold text-[#1F1F1F] tracking-tight leading-[1.14]">
                    Bangun Masa Depan<br>
                    <span class="text-[#004ADA]">Ekosistem Digital</span> Bersama<br>
                    <span class="text-[#004ADA]">KMID</span>
                </h1>

                <!-- Subtitle -->
                <p class="mt-6 sm:mt-8 text-base sm:text-lg md:text-xl text-[#474747] max-w-2xl mx-auto leading-relaxed font-normal">
                    Menghadirkan solusi teknologi berdampak dan memborong prestasi nasional untuk almamater dan Indonesia.
                </p>
            </div>
        </section>

        {{-- ============================================= --}}
        {{-- SECTION 2: BLUE INKUBASI LIDM & CARD SECTION  --}}
        {{-- ============================================= --}}
        <section id="lidm" class="bg-[#004ADA] py-20 lg:py-28 relative overflow-hidden">
            <!-- Subtle Background Glows -->
            <div class="absolute -top-32 -left-32 w-96 h-96 bg-white/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-[#FEA515]/20 rounded-full blur-3xl pointer-events-none"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
                    
                    <!-- Left Column: The White Card "Juara Umum LIDM Nasional 2024" -->
                    <div class="lg:col-span-5 reveal-on-scroll">
                        <div class="bg-white rounded-3xl p-7 sm:p-9 shadow-2xl relative overflow-hidden">
                            <!-- Subtle Golden Corner Glow -->
                            <div class="absolute -bottom-8 -right-8 w-32 h-32 bg-[#FEA515]/20 rounded-full blur-2xl pointer-events-none"></div>

                            <!-- Top Badges Row -->
                            <div class="flex items-center justify-between gap-2 flex-wrap">
                                <span class="bg-[#FFF9EE] text-[#FEA515] border border-[#FEA515]/20 text-[11px] font-bold px-3 py-1 rounded-md tracking-wider uppercase">
                                    PRESTASI TERTINGGI
                                </span>
                                <span class="text-[#707070] text-xs font-medium">
                                    Puspresnas Kemdikbud
                                </span>
                            </div>

                            <!-- Main Title -->
                            <div class="mt-5">
                                <h3 class="text-3xl sm:text-4xl font-extrabold text-[#004ADA] leading-tight">
                                    Juara Umum
                                </h3>
                                <p class="text-base sm:text-lg font-bold text-[#1F1F1F] mt-1">
                                    LIDM Nasional 2024
                                </p>
                            </div>

                            <!-- Two Metric Boxes -->
                            <div class="flex items-center gap-4 mt-7">
                                <!-- Box 1: Medali -->
                                <div class="bg-[#F4F7FF] rounded-2xl p-4 sm:p-5 text-center flex-1 border border-slate-100">
                                    <div class="text-3xl sm:text-4xl font-black text-[#004ADA] leading-none">
                                        8
                                    </div>
                                    <div class="text-xs text-[#707070] mt-1.5 font-medium">
                                        Medali Nasional
                                    </div>
                                </div>

                                <!-- Box 2: Divisi Lolos Final -->
                                <div class="bg-[#F4F7FF] rounded-2xl p-4 sm:p-5 text-center flex-1 border border-slate-100">
                                    <div class="text-3xl sm:text-4xl font-black text-[#FEA515] leading-none">
                                        80%
                                    </div>
                                    <div class="text-xs text-[#707070] mt-1.5 font-medium">
                                        Divisi Lolos Final
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Pusat Inkubasi LIDM Content -->
                    <div class="lg:col-span-7 text-white reveal-on-scroll">
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white leading-tight tracking-tight">
                            Pusat Inkubasi LIDM
                        </h2>

                        <p class="text-white/85 text-sm sm:text-base leading-relaxed mt-4 max-w-xl">
                            Wadah terintegrasi UGM untuk mencetak talenta unggul dan solusi digital inovatif melalui 5 divisi utama:
                        </p>

                        <!-- 5 Division Pill Tags -->
                        <div class="flex flex-wrap gap-3 mt-7">
                            <div class="bg-white/15 backdrop-blur-md border border-white/25 text-white text-xs sm:text-sm font-semibold px-4 py-2.5 rounded-xl flex items-center gap-2 hover:bg-white/25 transition-all shadow-sm">
                                <span class="w-1.5 h-1.5 rounded-full bg-white inline-block"></span>
                                <span>Inovasi Teknologi Pendidikan</span>
                            </div>

                            <div class="bg-white/15 backdrop-blur-md border border-white/25 text-white text-xs sm:text-sm font-semibold px-4 py-2.5 rounded-xl flex items-center gap-2 hover:bg-white/25 transition-all shadow-sm">
                                <span class="w-1.5 h-1.5 rounded-full bg-white inline-block"></span>
                                <span>Media Pembelajaran Digital</span>
                            </div>

                            <div class="bg-white/15 backdrop-blur-md border border-white/25 text-white text-xs sm:text-sm font-semibold px-4 py-2.5 rounded-xl flex items-center gap-2 hover:bg-white/25 transition-all shadow-sm">
                                <span class="w-1.5 h-1.5 rounded-full bg-white inline-block"></span>
                                <span>Desain Pengalaman Pengguna (UI/UX)</span>
                            </div>

                            <div class="bg-white/15 backdrop-blur-md border border-white/25 text-white text-xs sm:text-sm font-semibold px-4 py-2.5 rounded-xl flex items-center gap-2 hover:bg-white/25 transition-all shadow-sm">
                                <span class="w-1.5 h-1.5 rounded-full bg-white inline-block"></span>
                                <span>Video Edukasi Kreatif</span>
                            </div>

                            <div class="bg-white/15 backdrop-blur-md border border-white/25 text-white text-xs sm:text-sm font-semibold px-4 py-2.5 rounded-xl flex items-center gap-2 hover:bg-white/25 transition-all shadow-sm">
                                <span class="w-1.5 h-1.5 rounded-full bg-white inline-block"></span>
                                <span>Digital Microteaching</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============================================= --}}
        {{-- SECTION 3: PRESTASI LIDM GRID                 --}}
        {{-- ============================================= --}}
        <section id="prestasi" class="py-20 lg:py-28 relative overflow-hidden bg-white">
            <!-- Background Contour Waves -->
            <div class="absolute inset-0 z-0 pointer-events-none opacity-30">
                <img src="{{ asset('images/desainKMID/Hi-fi-design/Vector (2).svg') }}" alt="" class="w-full h-full object-cover">
            </div>

            <!-- Golden Starburst Decorative Flares on Sides -->
            <div class="absolute top-1/3 -left-24 sm:-left-32 w-[300px] sm:w-[420px] h-auto pointer-events-none z-0">
                <img src="{{ asset('images/desainKMID/Hi-fi-design/Star 2.svg') }}" alt="" class="w-full h-full opacity-75 filter blur-[10px]">
            </div>
            <div class="absolute top-1/4 -right-20 sm:-right-28 w-[280px] sm:w-[380px] h-auto pointer-events-none z-0">
                <img src="{{ asset('images/desainKMID/Hi-fi-design/Star 2.svg') }}" alt="" class="w-full h-full opacity-70 rotate-45 filter blur-[12px]">
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <!-- Section Heading -->
                <div class="text-center mb-16 sm:mb-20 reveal-on-scroll">
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#1F1F1F] tracking-tight">
                        Prestasi LIDM
                    </h2>
                    <!-- Orange Pill Underline -->
                    <div class="w-14 h-1.5 bg-[#FEA515] rounded-full mx-auto mt-2.5"></div>
                </div>

                <!-- 6 Achievement Cards Grid (3 Columns x 2 Rows) -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                    @for ($i = 0; $i < 6; $i++)
                        <div class="bg-white rounded-3xl p-7 sm:p-8 border border-slate-100 shadow-sm hover:shadow-2xl hover:shadow-blue-500/10 hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between reveal-on-scroll">
                            <div>
                                <!-- Top Bar: Badge and Logo Mark -->
                                <div class="flex items-center justify-between gap-4">
                                    <span class="inline-block bg-[#FFF9EE] text-[#FEA515] border border-[#FEA515]/30 text-[11px] font-bold px-3 py-1.5 rounded-lg tracking-wide uppercase">
                                        EMAS • LIDM 2024
                                    </span>
                                    <div class="w-9 h-9 bg-[#F4F7FF] rounded-xl flex items-center justify-center p-2 flex-shrink-0">
                                        <img src="{{ asset('images/desainKMID/Hi-fi-design/Frame 1686560879.svg') }}" alt="KMID" class="w-full h-auto">
                                    </div>
                                </div>

                                <!-- Card Title -->
                                <h3 class="text-xl sm:text-2xl font-bold text-[#1F1F1F] mt-5 leading-snug">
                                    EduQuest Interactive
                                </h3>

                                <!-- Card Description -->
                                <p class="text-sm text-[#707070] leading-relaxed mt-3">
                                    Platform gamifikasi pembelajaran adaptif untuk daerah 3T di Indonesia.
                                </p>
                            </div>
                        </div>
                    @endfor
                </div>

                <!-- Pagination Component -->
                <div class="flex items-center justify-center gap-2 mt-12 sm:mt-16 reveal-on-scroll">
                    <!-- Prev Button -->
                    <button type="button" class="w-9 h-9 rounded-full flex items-center justify-center text-[#004ADA] hover:bg-blue-50 transition-colors" aria-label="Halaman Sebelumnya">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>

                    <!-- Page 1 -->
                    <button type="button" class="w-9 h-9 rounded-full flex items-center justify-center text-[#004ADA] font-semibold text-sm hover:bg-blue-50 transition-colors">
                        1
                    </button>

                    <!-- Page 2 (Active) -->
                    <button type="button" class="w-9 h-9 rounded-full flex items-center justify-center bg-[#004ADA] text-white font-bold text-sm shadow-md shadow-blue-500/25">
                        2
                    </button>

                    <!-- Page 3 -->
                    <button type="button" class="w-9 h-9 rounded-full flex items-center justify-center text-[#004ADA] font-semibold text-sm hover:bg-blue-50 transition-colors">
                        3
                    </button>

                    <!-- Next Button -->
                    <button type="button" class="w-9 h-9 rounded-full flex items-center justify-center text-[#004ADA] hover:bg-blue-50 transition-colors" aria-label="Halaman Berikutnya">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            </div>
        </section>

        {{-- ============================================= --}}
        {{-- SECTION 4: KMID PARTNERSHIP SECTION           --}}
        {{-- ============================================= --}}
        <section id="partnership" class="py-16 sm:py-20 bg-white border-t border-slate-100/70 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Heading -->
                <div class="text-center mb-12 sm:mb-14 reveal-on-scroll">
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-[#1F1F1F] tracking-tight">
                        KMID Partnership
                    </h2>
                    <!-- Orange Pill Underline -->
                    <div class="w-14 h-1.5 bg-[#FEA515] rounded-full mx-auto mt-2"></div>
                </div>

                <!-- 6 Partner Cards Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 sm:gap-5">
                    <!-- Partner 1: GIK.ugm -->
                    <div class="bg-white rounded-2xl py-6 px-4 border border-slate-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col items-center justify-center text-center min-h-[110px] reveal-on-scroll">
                        <span class="text-lg sm:text-xl font-extrabold text-[#10B981] tracking-tight">
                            GIK.ugm
                        </span>
                        <span class="text-xs text-[#707070] mt-1.5 font-medium">
                            Media Partner
                        </span>
                    </div>

                    <!-- Partner 2: ASSETS -->
                    <div class="bg-white rounded-2xl py-6 px-4 border border-slate-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col items-center justify-center text-center min-h-[110px] reveal-on-scroll">
                        <span class="text-lg sm:text-xl font-black text-[#004ADA] tracking-wider">
                            ASSETS
                        </span>
                        <span class="text-xs text-[#707070] mt-1.5 font-medium">
                            Learning Partner
                        </span>
                    </div>

                    <!-- Partner 3: UGM -->
                    <div class="bg-white rounded-2xl py-6 px-4 border border-slate-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col items-center justify-center text-center min-h-[110px] reveal-on-scroll">
                        <span class="text-lg sm:text-xl font-black text-[#EF4444] tracking-wider">
                            UGM
                        </span>
                        <span class="text-xs text-[#707070] mt-1.5 font-medium">
                            Media Partner
                        </span>
                    </div>

                    <!-- Partner 4: KOMATIK UGM -->
                    <div class="bg-white rounded-2xl py-6 px-4 border border-slate-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col items-center justify-center text-center min-h-[110px] reveal-on-scroll">
                        <span class="text-base sm:text-lg font-extrabold text-[#1F1F1F] tracking-tight">
                            KOMATIK UGM
                        </span>
                        <span class="text-xs text-[#707070] mt-1.5 font-medium">
                            Learning Partner
                        </span>
                    </div>

                    <!-- Partner 5: GDGOC UGM -->
                    <div class="bg-white rounded-2xl py-6 px-4 border border-slate-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col items-center justify-center text-center min-h-[110px] reveal-on-scroll">
                        <span class="text-base sm:text-lg font-extrabold text-[#004ADA] tracking-tight">
                            GDGOC UGM
                        </span>
                        <span class="text-xs text-[#707070] mt-1.5 font-medium">
                            Student Developer
                        </span>
                    </div>

                    <!-- Partner 6: KOMATIK UGM -->
                    <div class="bg-white rounded-2xl py-6 px-4 border border-slate-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col items-center justify-center text-center min-h-[110px] reveal-on-scroll">
                        <span class="text-base sm:text-lg font-extrabold text-[#1F1F1F] tracking-tight">
                            KOMATIK UGM
                        </span>
                        <span class="text-xs text-[#707070] mt-1.5 font-medium">
                            Learning Partner
                        </span>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER SECTION -->
    <footer class="bg-[#00297A] text-white pt-16 pb-8 border-t border-blue-900/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 pb-12">
                <!-- Left Info -->
                <div class="lg:col-span-7">
                    <a href="{{ route('home') }}" class="inline-block mb-5">
                        <img src="{{ asset('images/desainKMID/Hi-fi-design/Frame 1686560881.svg') }}" alt="KMID Footer Logo" class="h-12 w-auto brightness-0 invert">
                    </a>
                    <address class="not-italic text-blue-100/80 text-sm sm:text-base leading-relaxed max-w-md">
                        Bulaksumur, Caturtunggal, Kapanewon Depok,<br>
                        Kabupaten Sleman, Daerah Istimewa<br>
                        Yogyakarta 55281.
                    </address>

                    <!-- Social Media Links -->
                    <div class="flex items-center gap-3 mt-6">
                        <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-[#0C5EFF] hover:bg-[#3C7EFF] rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-105 active:scale-95 shadow-md" aria-label="Instagram KMID">
                            <svg class="w-5 h-5 fill-current text-white" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="https://youtube.com" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-[#0C5EFF] hover:bg-[#3C7EFF] rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-105 active:scale-95 shadow-md" aria-label="YouTube KMID">
                            <svg class="w-5 h-5 fill-current text-white" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                        <a href="https://x.com" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-[#0C5EFF] hover:bg-[#3C7EFF] rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-105 active:scale-95 shadow-md" aria-label="X KMID">
                            <svg class="w-4 h-4 fill-current text-white" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                        <a href="https://tiktok.com" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-[#0C5EFF] hover:bg-[#3C7EFF] rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-105 active:scale-95 shadow-md" aria-label="TikTok KMID">
                            <svg class="w-4 h-4 fill-current text-white" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.82.56-1.36 1.52-1.4 2.52-.06 1.25.54 2.49 1.54 3.19 1 .7 2.37.82 3.46.3 1.02-.48 1.71-1.5 1.77-2.62.06-2.96.02-5.92.03-8.88 0-3.08-.01-6.16.01-9.24z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Right Nav Columns -->
                <div class="lg:col-span-5 grid grid-cols-2 gap-8">
                    <div>
                        <h4 class="font-bold text-base text-white mb-4 tracking-wider">Page</h4>
                        <ul class="space-y-2.5 text-sm">
                            <li><a href="{{ route('home') }}" class="text-blue-100/80 hover:text-white transition-colors">Home</a></li>
                            <li><a href="{{ route('about') }}" class="text-blue-100/80 hover:text-white transition-colors">About</a></li>
                            <li><a href="{{ route('activities') }}" class="text-blue-100/80 hover:text-white transition-colors">Activities</a></li>
                            <li><a href="{{ route('impact') }}" class="text-blue-100/80 hover:text-white transition-colors">Impact</a></li>
                            <li><a href="{{ route('home') }}#faq" class="text-blue-100/80 hover:text-white transition-colors">Information</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold text-base text-white mb-4 tracking-wider">Support</h4>
                        <ul class="space-y-2.5 text-sm">
                            <li><a href="{{ route('home') }}#faq" class="text-blue-100/80 hover:text-white transition-colors">FAQ</a></li>
                            <li><a href="mailto:kmid@ugm.ac.id" class="text-blue-100/80 hover:text-white transition-colors">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Bottom Line & Copyright -->
            <div class="border-t border-blue-900/60 pt-8 text-center text-xs sm:text-sm text-blue-200/70">
                <p>&copy; KMID. All rights reserved</p>
            </div>
        </div>
    </footer>
</body>
</html>
