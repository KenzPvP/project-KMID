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

    <!-- SITE HEADER / NAVBAR -->
    <header id="site-header" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 py-5 px-4 sm:px-8 lg:px-16">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <!-- Brand Logo -->
            <a href="#home" class="inline-block transition-transform duration-300 hover:scale-105" aria-label="KMID Home">
                <img src="{{ asset('images/desainKMID/Hi-fi-design/Frame 1686560881.svg') }}" alt="KMID - Komunitas Mahasiswa Inovasi Digital" class="h-10 sm:h-12 w-auto">
            </a>

            <!-- Desktop Nav Links -->
            <nav class="hidden md:flex items-center gap-8 lg:gap-10">
                <a href="{{ route('home') }}" class="text-base font-semibold text-[#004ADA] transition-colors hover:text-[#003FBA]">Home</a>
                <a href="{{ route('about') }}" class="text-base font-medium text-[#1F1F1F] transition-colors hover:text-[#004ADA]">About</a>
                <a href="{{ route('activities') }}" class="text-base font-medium text-[#1F1F1F] transition-colors hover:text-[#004ADA]">Activities</a>
                <a href="{{ route('home') }}#achievements" class="text-base font-medium text-[#1F1F1F] transition-colors hover:text-[#004ADA]">Impact</a>
                <a href="{{ route('home') }}#faq" class="text-base font-medium text-[#1F1F1F] transition-colors hover:text-[#004ADA]">Information</a>
            </nav>

            <!-- CTA Button -->
            <div class="hidden md:block">
                <a href="#join" class="inline-flex items-center justify-center px-6 py-2.5 bg-[#FEA515] text-white font-semibold text-sm rounded-full transition-all duration-300 hover:bg-[#EE9401] hover:shadow-lg hover:shadow-orange-500/25 active:scale-95">
                    Join KMID
                </a>
            </div>

            <!-- Mobile Hamburger Toggle -->
            <button id="menu-toggle" type="button" class="md:hidden p-2 rounded-lg text-[#004ADA] hover:bg-blue-50 focus:outline-none" aria-label="Buka Menu Navigation" aria-expanded="false">
                <svg id="menu-icon" class="w-7 h-7 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <!-- Mobile Drawer Menu -->
        <div id="mobile-menu" class="hidden md:hidden flex-col gap-4 mt-4 p-6 bg-white/95 backdrop-blur-xl rounded-2xl shadow-xl border border-slate-100">
            <a href="{{ route('home') }}" class="text-base font-semibold text-[#004ADA]">Home</a>
            <a href="{{ route('about') }}" class="text-base font-medium text-[#1F1F1F] hover:text-[#004ADA]">About</a>
            <a href="{{ route('activities') }}" class="text-base font-medium text-[#1F1F1F] hover:text-[#004ADA]">Activities</a>
            <a href="{{ route('home') }}#achievements" class="text-base font-medium text-[#1F1F1F] hover:text-[#004ADA]">Impact</a>
            <a href="{{ route('home') }}#faq" class="text-base font-medium text-[#1F1F1F] hover:text-[#004ADA]">Information</a>
            <div class="pt-2 border-t border-slate-100">
                <a href="#join" class="block w-full text-center px-5 py-3 bg-[#FEA515] text-white font-semibold text-sm rounded-full shadow-md">
                    Join KMID
                </a>
            </div>
        </div>
    </header>

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
                    <a href="#join" class="inline-flex items-center justify-center px-8 py-3.5 bg-[#FEA515] text-white font-semibold text-sm sm:text-base rounded-xl transition-all duration-300 hover:bg-[#EE9401] hover:shadow-xl hover:shadow-orange-500/30 hover:-translate-y-0.5 active:translate-y-0">
                        Join KMID
                    </a>
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

    <!-- FOOTER SECTION -->
    <footer class="bg-[#00297A] text-white pt-16 pb-8 border-t border-blue-900/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 pb-12">
                <!-- Left Info (Col 1-7) -->
                <div class="lg:col-span-7">
                    <a href="#home" class="inline-block mb-5">
                        <img src="{{ asset('images/desainKMID/Hi-fi-design/Frame 1686560881.svg') }}" alt="KMID Footer Logo" class="h-12 w-auto brightness-0 invert">
                    </a>
                    <address class="not-italic text-blue-100/80 text-sm sm:text-base leading-relaxed max-w-md">
                        Bulaksumur, Caturtunggal, Kapanewon Depok,<br>
                        Kabupaten Sleman, Daerah Istimewa<br>
                        Yogyakarta 55281.
                    </address>

                    <!-- Social Media Links -->
                    <div class="flex items-center gap-3 mt-6">
                        <!-- Instagram -->
                        <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-[#0C5EFF] hover:bg-[#3C7EFF] rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-105 active:scale-95 shadow-md" aria-label="Instagram KMID">
                            <svg class="w-5 h-5 fill-current text-white" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <!-- YouTube -->
                        <a href="https://youtube.com" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-[#0C5EFF] hover:bg-[#3C7EFF] rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-105 active:scale-95 shadow-md" aria-label="YouTube KMID">
                            <svg class="w-5 h-5 fill-current text-white" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                        <!-- X (Twitter) -->
                        <a href="https://x.com" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-[#0C5EFF] hover:bg-[#3C7EFF] rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-105 active:scale-95 shadow-md" aria-label="X KMID">
                            <svg class="w-4 h-4 fill-current text-white" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                        <!-- TikTok -->
                        <a href="https://tiktok.com" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-[#0C5EFF] hover:bg-[#3C7EFF] rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-105 active:scale-95 shadow-md" aria-label="TikTok KMID">
                            <svg class="w-4 h-4 fill-current text-white" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.82.56-1.36 1.52-1.4 2.52-.06 1.25.54 2.49 1.54 3.19 1 .7 2.37.82 3.46.3 1.02-.48 1.71-1.5 1.77-2.62.06-2.96.02-5.92.03-8.88 0-3.08-.01-6.16.01-9.24z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Right Nav Columns (Col 8-12) -->
                <div class="lg:col-span-5 grid grid-cols-2 gap-8">
                    <!-- Page Links Column -->
                    <div>
                        <h4 class="font-bold text-base text-white mb-4 tracking-wider">Page</h4>
                        <ul class="space-y-2.5 text-sm">
                            <li><a href="#home" class="text-blue-100/80 hover:text-white transition-colors">Home</a></li>
                            <li><a href="#about" class="text-blue-100/80 hover:text-white transition-colors">About</a></li>
                            <li><a href="#program" class="text-blue-100/80 hover:text-white transition-colors">Activities</a></li>
                            <li><a href="#achievements" class="text-blue-100/80 hover:text-white transition-colors">Impact</a></li>
                            <li><a href="#faq" class="text-blue-100/80 hover:text-white transition-colors">Information</a></li>
                        </ul>
                    </div>

                    <!-- Support Column -->
                    <div>
                        <h4 class="font-bold text-base text-white mb-4 tracking-wider">Support</h4>
                        <ul class="space-y-2.5 text-sm">
                            <li><a href="#faq" class="text-blue-100/80 hover:text-white transition-colors">FAQ</a></li>
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
