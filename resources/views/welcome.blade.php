<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KMID | Komunitas Mahasiswa Inovasi Digital</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased text-[#1F1F1F] bg-white selection:bg-[#004ADA] selection:text-white">

    @include('layouts.navbar')

    <main>
        <!-- HERO SECTION -->
        <section id="home" class="relative pt-36 pb-24 sm:pt-44 sm:pb-32 overflow-hidden hero-bg-pattern">
            <img src="{{ asset('images/desainKMID/Hi-fi-design/Rectangle 2762.svg') }}" alt="" aria-hidden="true" class="home-rectangle-ornament">
            <img src="{{ asset('images/desainKMID/Hi-fi-design/Rectangle 2762.svg') }}" alt="" aria-hidden="true" class="home-rectangle-ornament home-rectangle-ornament-right">
            <!-- Decorative Starburst Glows -->
            <div class="absolute -top-10 -left-10 w-80 sm:w-96 h-80 sm:h-96 bg-[#FEA515]/25 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute top-1/2 -right-16 w-80 sm:w-96 h-80 sm:h-96 bg-[#FEA515]/20 rounded-full blur-3xl pointer-events-none"></div>

            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 reveal-on-scroll">
                <!-- Headline -->
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold tracking-tight text-[#1F1F1F] leading-[1.12]">
                    Bangun Masa Depan <span class="text-[#004ADA]">Ekosistem</span> <br class="hidden sm:inline">
                    <span class="text-[#004ADA]">Digital</span> Bersama <span class="text-[#004ADA]">KMID</span>
                </h1>

                <!-- Subtitle -->
                <p class="mt-6 text-base sm:text-lg md:text-xl text-[#474747] max-w-3xl mx-auto leading-relaxed font-normal">
                    Wadah kolaborasi mahasiswa UGM untuk belajar, berinovasi, dan mengembangkan ide inovasi digital yang aplikatif.
                </p>

                <!-- Hero Actions -->
                <div class="mt-10 flex flex-wrap justify-center gap-4 sm:gap-6">
                    <a href="#program" class="inline-flex items-center gap-2.5 px-7 py-3.5 bg-[#004ADA] text-white font-semibold text-sm sm:text-base rounded-xl transition-all duration-300 hover:bg-[#003FBA] hover:shadow-xl hover:shadow-blue-600/30 hover:-translate-y-0.5 active:translate-y-0">
                        <span>Pelajari Program Kami</span>
                        <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-0.5 group-hover:-translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M7 17L17 7M17 7H7M17 7V17"/>
                        </svg>
                    </a>
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('admin.pendaftar.index') }}" class="inline-flex items-center justify-center px-8 py-3.5 bg-[#004ADA] text-white font-semibold text-sm sm:text-base rounded-xl transition-all duration-300 hover:bg-[#003bb0] hover:shadow-xl hover:shadow-blue-500/30 hover:-translate-y-0.5 active:translate-y-0">
                                Dashboard Admin
                            </a>
                        @elseif(auth()->user()->role === 'staff')
                            <a href="{{ route('staff.pendaftar.index') }}" class="inline-flex items-center justify-center px-8 py-3.5 bg-[#FEA515] text-white font-semibold text-sm sm:text-base rounded-xl transition-all duration-300 hover:bg-[#EE9401] hover:shadow-xl hover:shadow-orange-500/30 hover:-translate-y-0.5 active:translate-y-0">
                                Dashboard Staff
                            </a>
                        @else
                            <a href="{{ route('open-recruitment') }}" class="inline-flex items-center justify-center px-8 py-3.5 bg-[#FEA515] text-white font-semibold text-sm sm:text-base rounded-xl transition-all duration-300 hover:bg-[#EE9401] hover:shadow-xl hover:shadow-orange-500/30 hover:-translate-y-0.5 active:translate-y-0">
                                Dashboard Oprec
                            </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-8 py-3.5 bg-[#FEA515] text-white font-semibold text-sm sm:text-base rounded-xl transition-all duration-300 hover:bg-[#EE9401] hover:shadow-xl hover:shadow-orange-500/30 hover:-translate-y-0.5 active:translate-y-0">
                            Join KMID
                        </a>
                    @endauth
                </div>
            </div>
        </section>

        <!-- ABOUT SECTION ("Tentang KMID") -->
        <section id="about" class="relative bg-[#004ADA] py-20 lg:py-28 overflow-hidden">
            <!-- Background Accent Shapes -->
            <div class="absolute -bottom-20 -left-20 w-96 h-96 bg-[#FEA515]/30 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -top-20 -right-20 w-96 h-96 bg-[#0C5EFF]/40 rounded-full blur-3xl pointer-events-none"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">
                    <!-- Left Side Art Container Card -->
                    <div class="lg:col-span-5 reveal-on-scroll">
                        <div class="aspect-4/3 bg-white rounded-3xl shadow-2xl p-8 sm:p-12 flex items-center justify-center border border-white/20 transition-transform duration-500 hover:scale-[1.02]">
                            <img src="{{ asset('images/desainKMID/Hi-fi-design/Frame 1686560879.svg') }}" alt="KMID Logo Symbol" class="w-40 sm:w-52 h-auto object-contain drop-shadow-md">
                        </div>
                    </div>

                    <!-- Right Side Content -->
                    <div class="lg:col-span-7 text-white reveal-on-scroll">
                        <!-- Styled Header Image / Text -->
                        <div class="mb-6">
                            <h2 class="section-heading section-heading-light">Tentang KMID</h2>
                        </div>
                        
                        <p class="text-white/95 text-base sm:text-lg md:text-xl leading-relaxed font-normal">
                            Wadah kolaborasi mahasiswa UGM untuk belajar, berinovasi, dan menciptakan solusi teknologi yang berdampak. Wadah kolaborasi mahasiswa UGM untuk belajar, berinovasi, dan menciptakan solusi teknologi yang berdampak. Wadah kolaborasi mahasiswa UGM untuk belajar, berinovasi, dan menciptakan solusi teknologi yang berdampak.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <div class="section-transition-ornament about-program-ornament" aria-hidden="true"><img src="{{ asset('images/desainKMID/Hi-fi-design/Star 2.svg') }}" alt=""></div>

        <!-- PROGRAMS SECTION ("Programs") -->
        <section id="program" class="py-20 lg:py-28 relative pattern-bg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <!-- Section Title -->
                <div class="text-center mb-16 reveal-on-scroll">
                    <h2 class="section-heading">Programs</h2>
                </div>

                <!-- Program Cards Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Card 1: Seminar -->
                    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-100 shadow-lg shadow-slate-200/50 hover:shadow-2xl hover:shadow-blue-500/10 transition-all duration-300 hover:-translate-y-2 grid grid-cols-1 sm:grid-cols-2 gap-6 items-center reveal-on-scroll">
                        <div>
                            <h3 class="text-2xl font-bold text-[#1F1F1F]">Seminar</h3>
                            <p class="mt-3 text-sm text-[#707070] leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <a href="#program" class="inline-flex items-center gap-1.5 mt-6 px-4 py-2 bg-[#004ADA] text-white text-xs sm:text-sm font-semibold rounded-lg transition-colors hover:bg-[#003FBA]">
                                <span>Lihat Selengkapnya</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M7 17L17 7M17 7H7M17 7V17"/></svg>
                            </a>
                        </div>
                        <div class="bg-[#E9E9E9] rounded-2xl aspect-square flex items-center justify-center p-6">
                            <img src="{{ asset('images/desainKMID/Hi-fi-design/Frame 1686560879.svg') }}" alt="Seminar KMID" class="w-24 h-auto">
                        </div>
                    </div>

                    <!-- Card 2: Networking & Softskill -->
                    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-100 shadow-lg shadow-slate-200/50 hover:shadow-2xl hover:shadow-blue-500/10 transition-all duration-300 hover:-translate-y-2 grid grid-cols-1 sm:grid-cols-2 gap-6 items-center reveal-on-scroll">
                        <div>
                            <h3 class="text-2xl font-bold text-[#1F1F1F]">Networking & Softskill</h3>
                            <p class="mt-3 text-sm text-[#707070] leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <a href="#program" class="inline-flex items-center gap-1.5 mt-6 px-4 py-2 bg-[#004ADA] text-white text-xs sm:text-sm font-semibold rounded-lg transition-colors hover:bg-[#003FBA]">
                                <span>Lihat Selengkapnya</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M7 17L17 7M17 7H7M17 7V17"/></svg>
                            </a>
                        </div>
                        <div class="bg-[#E9E9E9] rounded-2xl aspect-square flex items-center justify-center p-6">
                            <img src="{{ asset('images/desainKMID/Hi-fi-design/Frame 1686560879.svg') }}" alt="Networking KMID" class="w-24 h-auto">
                        </div>
                    </div>

                    <!-- Card 3: Digital Bootcamp & Mentoring -->
                    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-100 shadow-lg shadow-slate-200/50 hover:shadow-2xl hover:shadow-blue-500/10 transition-all duration-300 hover:-translate-y-2 grid grid-cols-1 sm:grid-cols-2 gap-6 items-center reveal-on-scroll">
                        <div>
                            <h3 class="text-2xl font-bold text-[#1F1F1F]">Digital Bootcamp & Mentoring</h3>
                            <p class="mt-3 text-sm text-[#707070] leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <a href="#program" class="inline-flex items-center gap-1.5 mt-6 px-4 py-2 bg-[#004ADA] text-white text-xs sm:text-sm font-semibold rounded-lg transition-colors hover:bg-[#003FBA]">
                                <span>Lihat Selengkapnya</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M7 17L17 7M17 7H7M17 7V17"/></svg>
                            </a>
                        </div>
                        <div class="bg-[#E9E9E9] rounded-2xl aspect-square flex items-center justify-center p-6">
                            <img src="{{ asset('images/desainKMID/Hi-fi-design/Frame 1686560879.svg') }}" alt="Bootcamp KMID" class="w-24 h-auto">
                        </div>
                    </div>
                </div>

                <!-- Bottom Row: 2 Cards Centered -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto mt-8">
                    <!-- Card 4: Persiapan Lomba & Delegasi Kampus -->
                    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-100 shadow-lg shadow-slate-200/50 hover:shadow-2xl hover:shadow-blue-500/10 transition-all duration-300 hover:-translate-y-2 grid grid-cols-1 sm:grid-cols-2 gap-6 items-center reveal-on-scroll">
                        <div>
                            <h3 class="text-2xl font-bold text-[#1F1F1F]">Persiapan Lomba & Delegasi Kampus</h3>
                            <p class="mt-3 text-sm text-[#707070] leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <a href="#program" class="inline-flex items-center gap-1.5 mt-6 px-4 py-2 bg-[#004ADA] text-white text-xs sm:text-sm font-semibold rounded-lg transition-colors hover:bg-[#003FBA]">
                                <span>Lihat Selengkapnya</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M7 17L17 7M17 7H7M17 7V17"/></svg>
                            </a>
                        </div>
                        <div class="bg-[#E9E9E9] rounded-2xl aspect-square flex items-center justify-center p-6">
                            <img src="{{ asset('images/desainKMID/Hi-fi-design/Frame 1686560879.svg') }}" alt="Persiapan Lomba KMID" class="w-24 h-auto">
                        </div>
                    </div>

                    <!-- Card 5: Innovation Showcase -->
                    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-100 shadow-lg shadow-slate-200/50 hover:shadow-2xl hover:shadow-blue-500/10 transition-all duration-300 hover:-translate-y-2 grid grid-cols-1 sm:grid-cols-2 gap-6 items-center reveal-on-scroll">
                        <div>
                            <h3 class="text-2xl font-bold text-[#1F1F1F]">Innovation Showcase</h3>
                            <p class="mt-3 text-sm text-[#707070] leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <a href="#program" class="inline-flex items-center gap-1.5 mt-6 px-4 py-2 bg-[#004ADA] text-white text-xs sm:text-sm font-semibold rounded-lg transition-colors hover:bg-[#003FBA]">
                                <span>Lihat Selengkapnya</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M7 17L17 7M17 7H7M17 7V17"/></svg>
                            </a>
                        </div>
                        <div class="bg-[#E9E9E9] rounded-2xl aspect-square flex items-center justify-center p-6">
                            <img src="{{ asset('images/desainKMID/Hi-fi-design/Frame 1686560879.svg') }}" alt="Innovation Showcase KMID" class="w-24 h-auto">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ACHIEVEMENTS SECTION ("Achievments") -->
        <section id="achievements" class="py-20 lg:py-28 relative bg-white">
            <img src="{{ asset('images/desainKMID/Hi-fi-design/Rectangle 2762.svg') }}" alt="" aria-hidden="true" class="achievements-rectangle-ornament">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <!-- Section Title -->
                <div class="text-center mb-16 reveal-on-scroll">
                    <h2 class="section-heading">Achievments</h2>
                </div>

                <!-- Achievements Cards Row (3 Cards) -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Achievement 1 -->
                    <div class="achievement-card bg-white rounded-3xl p-6 border border-slate-100 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between reveal-on-scroll">
                        <div>
                            <div class="bg-[#E9E9E9] rounded-2xl aspect-4/3 flex items-center justify-center p-8">
                                <img src="{{ asset('images/desainKMID/Hi-fi-design/Frame 1686560879.svg') }}" alt="Medali Emas IPDP" class="w-32 h-auto">
                            </div>
                            <span class="inline-block bg-[#FFEDD0] text-[#EE9401] text-xs font-semibold px-3.5 py-1 rounded-full mt-6 mb-3">LIDM 2024</span>
                            <h3 class="font-bold text-lg text-[#1F1F1F] leading-snug">Medali Emas – Divisi Inovasi Pembelajaran Digital (IPDP)</h3>
                            <p class="text-sm text-[#707070] mt-3 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do...</p>
                        </div>
                    </div>

                    <!-- Achievement 2 -->
                    <div class="achievement-card bg-white rounded-3xl p-6 border border-slate-100 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between reveal-on-scroll">
                        <div>
                            <div class="bg-[#E9E9E9] rounded-2xl aspect-4/3 flex items-center justify-center p-8">
                                <img src="{{ asset('images/desainKMID/Hi-fi-design/Frame 1686560879.svg') }}" alt="Juara Favorit PDP" class="w-32 h-auto">
                            </div>
                            <span class="inline-block bg-[#FFEDD0] text-[#EE9401] text-xs font-semibold px-3.5 py-1 rounded-full mt-6 mb-3">LIDM 2025</span>
                            <h3 class="font-bold text-lg text-[#1F1F1F] leading-snug">Juara Favorit – Divisi Poster Digital Pendidikan (PDP)</h3>
                            <p class="text-sm text-[#707070] mt-3 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do...</p>
                        </div>
                    </div>

                    <!-- Achievement 3 -->
                    <div class="achievement-card bg-white rounded-3xl p-6 border border-slate-100 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between reveal-on-scroll">
                        <div>
                            <div class="bg-[#E9E9E9] rounded-2xl aspect-4/3 flex items-center justify-center p-8">
                                <img src="{{ asset('images/desainKMID/Hi-fi-design/Frame 1686560879.svg') }}" alt="Medali Perak MD" class="w-32 h-auto">
                            </div>
                            <span class="inline-block bg-[#FFEDD0] text-[#EE9401] text-xs font-semibold px-3.5 py-1 rounded-full mt-6 mb-3">LIDM 2025</span>
                            <h3 class="font-bold text-lg text-[#1F1F1F] leading-snug">Medali Perak – Divisi Microteaching Digital (MD)</h3>
                            <p class="text-sm text-[#707070] mt-3 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do...</p>
                        </div>
                    </div>
                </div>

                <!-- Pagination Component -->
                <div class="flex items-center justify-center gap-4 mt-12 text-sm font-semibold text-[#004ADA]">
                    <button type="button" class="p-2 rounded-full hover:bg-blue-50 transition-colors" aria-label="Halaman sebelumnya">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <button type="button" data-page="1" class="w-9 h-9 rounded-full flex items-center justify-center transition-all text-[#004ADA] hover:bg-blue-50">1</button>
                    <button type="button" data-page="2" class="w-9 h-9 rounded-full bg-[#004ADA] text-white flex items-center justify-center shadow-md">2</button>
                    <button type="button" class="p-2 rounded-full hover:bg-blue-50 transition-colors" aria-label="Halaman berikutnya">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>
        </section>

        <div class="section-transition-ornament achievements-faq-ornament" aria-hidden="true"><img src="{{ asset('images/desainKMID/Hi-fi-design/Star 3.svg') }}" alt=""></div>

        <!-- FAQ SECTION ("FAQ'S") -->
        <section id="faq" class="py-20 lg:py-28 relative pattern-bg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <!-- Section Title & Subtitle Badge -->
                <div class="text-center mb-16 reveal-on-scroll">
                    <h2 class="section-heading">FAQ'S</h2>
                    <div class="inline-block bg-[#004ADA] text-white px-8 py-3.5 rounded-full text-base sm:text-xl font-semibold shadow-lg shadow-blue-500/20">
                        Cari Tahu Semua Pertanyaanmu
                    </div>
                </div>

                <!-- 2-Column Accordion Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 max-w-6xl mx-auto">
                    <!-- Column 1 -->
                    <div class="space-y-4">
                        <!-- Q1 -->
                        <div class="faq-card bg-[#004ADA] rounded-2xl text-white shadow-md transition-all duration-300 hover:bg-[#003FBA] overflow-hidden">
                            <button type="button" class="faq-trigger w-full px-6 py-5 flex items-center justify-between text-left font-semibold text-base sm:text-lg focus:outline-none">
                                <span>Apa itu KMID UGM dan apa fokus utamanya?</span>
                                <span class="faq-icon text-2xl font-light transition-transform duration-300 ml-4 shrink-0">+</span>
                            </button>
                            <div class="faq-content max-h-0 opacity-0 overflow-hidden accordion-content px-6 pb-5 text-sm sm:text-base text-blue-100/90 leading-relaxed">
                                KMID (Komunitas Mahasiswa Inovasi Digital) UGM adalah wadah kolaborasi mahasiswa untuk belajar, berinovasi, dan mengembangkan teknologi digital pendidikan yang bermanfaat dan aplikatif.
                            </div>
                        </div>

                        <!-- Q2 -->
                        <div class="faq-card bg-[#004ADA] rounded-2xl text-white shadow-md transition-all duration-300 hover:bg-[#003FBA] overflow-hidden">
                            <button type="button" class="faq-trigger w-full px-6 py-5 flex items-center justify-between text-left font-semibold text-base sm:text-lg focus:outline-none">
                                <span>Siapa saja yang bisa bergabung dengan KMID?</span>
                                <span class="faq-icon text-2xl font-light transition-transform duration-300 ml-4 shrink-0">+</span>
                            </button>
                            <div class="faq-content max-h-0 opacity-0 overflow-hidden accordion-content px-6 pb-5 text-sm sm:text-base text-blue-100/90 leading-relaxed">
                                Seluruh mahasiswa aktif Universitas Gadjah Mada (UGM) dari berbagai fakultas, jurusan, dan angkatan berkesempatan untuk mendaftar dan berkembang bersama.
                            </div>
                        </div>

                        <!-- Q3 -->
                        <div class="faq-card bg-[#004ADA] rounded-2xl text-white shadow-md transition-all duration-300 hover:bg-[#003FBA] overflow-hidden">
                            <button type="button" class="faq-trigger w-full px-6 py-5 flex items-center justify-between text-left font-semibold text-base sm:text-lg focus:outline-none">
                                <span>Bagaimana cara mendaftar menjadi anggota KMID?</span>
                                <span class="faq-icon text-2xl font-light transition-transform duration-300 ml-4 shrink-0">+</span>
                            </button>
                            <div class="faq-content max-h-0 opacity-0 overflow-hidden accordion-content px-6 pb-5 text-sm sm:text-base text-blue-100/90 leading-relaxed">
                                Kamu dapat mengisi formulir pendaftaran Open Recruitment (ORec) resmi KMID ketika periode alur pendaftaran dibuka secara berkala.
                            </div>
                        </div>

                        <!-- Q4 -->
                        <div class="faq-card bg-[#004ADA] rounded-2xl text-white shadow-md transition-all duration-300 hover:bg-[#003FBA] overflow-hidden">
                            <button type="button" class="faq-trigger w-full px-6 py-5 flex items-center justify-between text-left font-semibold text-base sm:text-lg focus:outline-none">
                                <span>Apakah KMID hanya berfokus pada lomba LIDM saja?</span>
                                <span class="faq-icon text-2xl font-light transition-transform duration-300 ml-4 shrink-0">+</span>
                            </button>
                            <div class="faq-content max-h-0 opacity-0 overflow-hidden accordion-content px-6 pb-5 text-sm sm:text-base text-blue-100/90 leading-relaxed">
                                Tidak, selain persiapan dan perwakilan lomba LIDM, KMID rutin mengadakan seminar, bootcamp, networking softskill, serta pembimbingan proyek teknologi digital.
                            </div>
                        </div>
                    </div>

                    <!-- Column 2 -->
                    <div class="space-y-4">
                        <!-- Q5 -->
                        <div class="faq-card bg-[#004ADA] rounded-2xl text-white shadow-md transition-all duration-300 hover:bg-[#003FBA] overflow-hidden">
                            <button type="button" class="faq-trigger w-full px-6 py-5 flex items-center justify-between text-left font-semibold text-base sm:text-lg focus:outline-none">
                                <span>Apakah mahasiswa baru (Maba) bisa langsung mendaftar?</span>
                                <span class="faq-icon text-2xl font-light transition-transform duration-300 ml-4 shrink-0">+</span>
                            </button>
                            <div class="faq-content max-h-0 opacity-0 overflow-hidden accordion-content px-6 pb-5 text-sm sm:text-base text-blue-100/90 leading-relaxed">
                                Ya, sangat bisa! Mahasiswa baru sangat disarankan untuk bergabung agar dapat mengasah bakat dan pengalaman berorganisasi sejak awal perkuliahan.
                            </div>
                        </div>

                        <!-- Q6 -->
                        <div class="faq-card bg-[#004ADA] rounded-2xl text-white shadow-md transition-all duration-300 hover:bg-[#003FBA] overflow-hidden">
                            <button type="button" class="faq-trigger w-full px-6 py-5 flex items-center justify-between text-left font-semibold text-base sm:text-lg focus:outline-none">
                                <span>Bagaimana alur seleksi anggota baru KMID?</span>
                                <span class="faq-icon text-2xl font-light transition-transform duration-300 ml-4 shrink-0">+</span>
                            </button>
                            <div class="faq-content max-h-0 opacity-0 overflow-hidden accordion-content px-6 pb-5 text-sm sm:text-base text-blue-100/90 leading-relaxed">
                                Alur seleksi meliputi tahap pendaftaran berkas/portofolio online, tahap interview/wawancara, serta pengumuman hasil kelulusan anggota.
                            </div>
                        </div>

                        <!-- Q7 -->
                        <div class="faq-card bg-[#004ADA] rounded-2xl text-white shadow-md transition-all duration-300 hover:bg-[#003FBA] overflow-hidden">
                            <button type="button" class="faq-trigger w-full px-6 py-5 flex items-center justify-between text-left font-semibold text-base sm:text-lg focus:outline-none">
                                <span>Bagaimana alur seleksi anggota baru KMID?</span>
                                <span class="faq-icon text-2xl font-light transition-transform duration-300 ml-4 shrink-0">+</span>
                            </button>
                            <div class="faq-content max-h-0 opacity-0 overflow-hidden accordion-content px-6 pb-5 text-sm sm:text-base text-blue-100/90 leading-relaxed">
                                Setiap alur seleksi dirancang transparan untuk menyesuaikan minat dan minat calon anggota pada divisi yang dituju.
                            </div>
                        </div>

                        <!-- Q8 -->
                        <div class="faq-card bg-[#004ADA] rounded-2xl text-white shadow-md transition-all duration-300 hover:bg-[#003FBA] overflow-hidden">
                            <button type="button" class="faq-trigger w-full px-6 py-5 flex items-center justify-between text-left font-semibold text-base sm:text-lg focus:outline-none">
                                <span>Bagaimana alur seleksi anggota baru KMID?</span>
                                <span class="faq-icon text-2xl font-light transition-transform duration-300 ml-4 shrink-0">+</span>
                            </button>
                            <div class="faq-content max-h-0 opacity-0 overflow-hidden accordion-content px-6 pb-5 text-sm sm:text-base text-blue-100/90 leading-relaxed">
                                Informasi lengkap alur seleksi selalu dibagikan secara mendetail melalui Instagram dan website resmi KMID.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- JOIN CTA SECTION anchor -->
        <div id="join"></div>
    </main>

    @include('layouts.footer')

</body>
</html>
