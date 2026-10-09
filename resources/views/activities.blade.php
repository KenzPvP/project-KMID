<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Activities | KMID - Komunitas Mahasiswa Inovasi Digital</title>

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
            <a href="{{ route('home') }}" class="inline-block transition-transform duration-300 hover:scale-105" aria-label="KMID Home">
                <img src="{{ asset('images/desainKMID/Hi-fi-design/Frame 1686560881.svg') }}" alt="KMID - Komunitas Mahasiswa Inovasi Digital" class="h-10 sm:h-12 w-auto">
            </a>

            <!-- Desktop Nav Links -->
            <nav class="hidden md:flex items-center gap-8 lg:gap-10">
                <a href="{{ route('home') }}" class="text-base font-medium text-[#1F1F1F] transition-colors hover:text-[#004ADA]">Home</a>
                <a href="{{ route('about') }}" class="text-base font-medium text-[#1F1F1F] transition-colors hover:text-[#004ADA]">About</a>
                <a href="{{ route('activities') }}" class="text-base font-semibold text-[#004ADA] transition-colors hover:text-[#003FBA]">Activities</a>
                <a href="{{ route('home') }}#achievements" class="text-base font-medium text-[#1F1F1F] transition-colors hover:text-[#004ADA]">Impact</a>
                <a href="{{ route('home') }}#faq" class="text-base font-medium text-[#1F1F1F] transition-colors hover:text-[#004ADA]">Information</a>
            </nav>

            <!-- CTA Button -->
            <div class="hidden md:block">
                <a href="#agenda" class="inline-flex items-center justify-center px-6 py-2.5 bg-[#FEA515] text-white font-semibold text-sm rounded-full transition-all duration-300 hover:bg-[#EE9401] hover:shadow-lg hover:shadow-orange-500/25 active:scale-95">
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
            <a href="{{ route('home') }}" class="text-base font-medium text-[#1F1F1F] hover:text-[#004ADA]">Home</a>
            <a href="{{ route('about') }}" class="text-base font-medium text-[#1F1F1F] hover:text-[#004ADA]">About</a>
            <a href="{{ route('activities') }}" class="text-base font-semibold text-[#004ADA]">Activities</a>
            <a href="{{ route('home') }}#achievements" class="text-base font-medium text-[#1F1F1F] hover:text-[#004ADA]">Impact</a>
            <a href="{{ route('home') }}#faq" class="text-base font-medium text-[#1F1F1F] hover:text-[#004ADA]">Information</a>
            <div class="pt-2 border-t border-slate-100">
                <a href="#agenda" class="block w-full text-center px-5 py-3 bg-[#FEA515] text-white font-semibold text-sm rounded-full shadow-md">
                    Join KMID
                </a>
            </div>
        </div>
    </header>

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
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-[68px] font-extrabold text-[#1F1F1F] tracking-tight leading-[1.12]">
                    Rangkaian Aktivitas dan<br>
                    Kurikulum <span class="text-[#004ADA]">KMID</span> <span class="text-[#FEA515]">UGM</span>
                </h1>

                <!-- Subtitle -->
                <p class="mt-6 sm:mt-8 text-base sm:text-lg md:text-xl text-[#474747] max-w-2xl mx-auto leading-relaxed font-normal">
                    Wadah kolaborasi mahasiswa UGM untuk belajar, berinovasi, dan mengembangkan ide inovasi digital yang aplikatif.
                </p>
            </div>
        </section>

        {{-- ============================================= --}}
        {{-- SECTION 2: PROGRAMS GRID SECTION              --}}
        {{-- ============================================= --}}
        <section id="programs" class="py-16 sm:py-24 relative overflow-hidden">
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
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#004ADA] tracking-wide uppercase">PROGRAMS</h2>
                    <!-- Orange Pill Underline -->
                    <div class="w-14 h-1 bg-[#FEA515] rounded-full mx-auto mt-2.5"></div>
                    <!-- Description -->
                    <p class="mt-4 text-sm sm:text-base text-[#707070] max-w-2xl mx-auto leading-relaxed">
                        Program terstruktur berdurasi mingguan hingga semesteran yang dirancang untuk mentransformasi minat digital menjadi portofolio inovasi berdampak nyata.
                    </p>
                </div>

                <!-- 6 Program Cards Grid (3 Columns x 2 Rows) -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                    @php
                        $programs = [
                            [
                                'category' => 'KOMPETISI PUSPRESNAS',
                                'badge_bg' => 'bg-[#EBF2FF]',
                                'badge_text' => 'text-[#004ADA]',
                                'title' => 'Seminar',
                                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                                'date' => 'Maret – Juni 2025',
                                'date_icon' => 'dot',
                                'platform' => 'Zoom/Google meet',
                                'platform_bg' => 'bg-[#E8F8F0]',
                                'platform_text' => 'text-[#10B981]',
                            ],
                            [
                                'category' => 'CAREER & SOFTSKILL',
                                'badge_bg' => 'bg-[#FFF5E6]',
                                'badge_text' => 'text-[#EE9401]',
                                'title' => 'Networking & Softskill',
                                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                                'date' => 'Sabtu & Minggu',
                                'date_icon' => 'calendar',
                                'platform' => 'Zoom/Google Meet',
                                'platform_bg' => 'bg-[#EBF2FF]',
                                'platform_text' => 'text-[#004ADA]',
                            ],
                            [
                                'category' => 'HACKATHON',
                                'badge_bg' => 'bg-[#F7EEFF]',
                                'badge_text' => 'text-[#9333EA]',
                                'title' => 'Digital Bootcamp & Mentoring',
                                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                                'date' => '12–14 April 2025',
                                'date_icon' => 'dot',
                                'platform' => 'GIK UGM',
                                'platform_bg' => 'bg-[#F7EEFF]',
                                'platform_text' => 'text-[#9333EA]',
                            ],
                            [
                                'category' => 'KOMPETISI PUSPRESNAS',
                                'badge_bg' => 'bg-[#EBF2FF]',
                                'badge_text' => 'text-[#004ADA]',
                                'title' => 'Seminar',
                                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                                'date' => 'Maret – Juni 2025',
                                'date_icon' => 'dot',
                                'platform' => 'Zoom/Google meet',
                                'platform_bg' => 'bg-[#E8F8F0]',
                                'platform_text' => 'text-[#10B981]',
                            ],
                            [
                                'category' => 'CAREER & SOFTSKILL',
                                'badge_bg' => 'bg-[#FFF5E6]',
                                'badge_text' => 'text-[#EE9401]',
                                'title' => 'Networking & Softskill',
                                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                                'date' => 'Sabtu & Minggu',
                                'date_icon' => 'calendar',
                                'platform' => 'Zoom/Google Meet',
                                'platform_bg' => 'bg-[#EBF2FF]',
                                'platform_text' => 'text-[#004ADA]',
                            ],
                            [
                                'category' => 'HACKATHON',
                                'badge_bg' => 'bg-[#F7EEFF]',
                                'badge_text' => 'text-[#9333EA]',
                                'title' => 'Digital Bootcamp & Mentoring',
                                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                                'date' => '12–14 April 2025',
                                'date_icon' => 'dot',
                                'platform' => 'GIK UGM',
                                'platform_bg' => 'bg-[#F7EEFF]',
                                'platform_text' => 'text-[#9333EA]',
                            ],
                        ];
                    @endphp

                    @foreach ($programs as $item)
                        <div class="bg-white rounded-3xl p-7 sm:p-8 border border-slate-100 shadow-sm hover:shadow-2xl hover:shadow-blue-500/10 hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between reveal-on-scroll">
                            <div>
                                <!-- Top Bar: Badge and Logo Mark -->
                                <div class="flex items-center justify-between gap-4">
                                    <span class="inline-block {{ $item['badge_bg'] }} {{ $item['badge_text'] }} text-[11px] font-bold px-3 py-1.5 rounded-lg tracking-wide uppercase">
                                        {{ $item['category'] }}
                                    </span>
                                    <div class="w-9 h-9 bg-[#F4F7FF] rounded-xl flex items-center justify-center p-2 flex-shrink-0">
                                        <img src="{{ asset('images/desainKMID/Hi-fi-design/Frame 1686560879.svg') }}" alt="KMID" class="w-full h-auto">
                                    </div>
                                </div>

                                <!-- Card Title -->
                                <h3 class="text-xl sm:text-2xl font-bold text-[#1F1F1F] mt-5 leading-snug">
                                    {{ $item['title'] }}
                                </h3>

                                <!-- Card Description -->
                                <p class="text-sm text-[#707070] leading-relaxed mt-3">
                                    {{ $item['desc'] }}
                                </p>
                            </div>

                            <!-- Bottom Meta Info -->
                            <div class="flex items-center justify-between gap-2 pt-6 mt-6 border-t border-slate-100 text-xs text-[#707070]">
                                <div class="flex items-center gap-1.5 font-medium">
                                    @if ($item['date_icon'] === 'calendar')
                                        <svg class="w-4 h-4 text-[#EE9401]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    @else
                                        <span class="w-2 h-2 rounded-full bg-[#FEA515] inline-block"></span>
                                    @endif
                                    <span>{{ $item['date'] }}</span>
                                </div>
                                <span class="{{ $item['platform_bg'] }} {{ $item['platform_text'] }} font-semibold text-[11px] px-2.5 py-1 rounded-md">
                                    {{ $item['platform'] }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ============================================= --}}
        {{-- SECTION 3: BLUE AGENDA & CTA SECTION          --}}
        {{-- ============================================= --}}
        <section id="agenda" class="bg-[#004ADA] py-20 lg:py-28 relative overflow-hidden">
            <!-- Subtle Background Glows -->
            <div class="absolute -top-32 -left-32 w-96 h-96 bg-white/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-[#FEA515]/20 rounded-full blur-3xl pointer-events-none"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                    
                    <!-- Left Column: The White Calendar/Agenda Card -->
                    <div class="lg:col-span-6 reveal-on-scroll">
                        <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-2xl border border-white/20">
                            <!-- Agenda Header & Month Tabs -->
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-100">
                                <div>
                                    <span class="text-xs font-bold text-[#004ADA] tracking-wider uppercase block">LINIMASA AGENDA</span>
                                    <h3 id="current-month-label" class="text-xl sm:text-2xl font-bold text-[#1F1F1F] mt-1">Maret — Juni 2025</h3>
                                </div>

                                <!-- Month Tabs -->
                                <div class="inline-flex bg-[#F4F7FF] p-1 rounded-xl gap-1 self-start sm:self-auto" id="month-tabs">
                                    <button type="button" data-month="mar" class="month-tab-btn px-3 py-1.5 rounded-lg text-xs font-semibold bg-[#004ADA] text-white shadow-sm transition-all">Mar</button>
                                    <button type="button" data-month="apr" class="month-tab-btn px-3 py-1.5 rounded-lg text-xs font-medium text-[#707070] hover:text-[#004ADA] transition-all">Apr</button>
                                    <button type="button" data-month="mei" class="month-tab-btn px-3 py-1.5 rounded-lg text-xs font-medium text-[#707070] hover:text-[#004ADA] transition-all">Mei</button>
                                    <button type="button" data-month="jun" class="month-tab-btn px-3 py-1.5 rounded-lg text-xs font-medium text-[#707070] hover:text-[#004ADA] transition-all">Jun</button>
                                </div>
                            </div>

                            <!-- Agenda Items List -->
                            <div class="space-y-5 pt-6" id="agenda-items-container">
                                @php
                                    $agendaItems = [
                                        [
                                            'month' => 'MEI',
                                            'day' => '18',
                                            'title' => 'Simulasi Pitching Delegasi Nasional',
                                            'desc' => 'Gladi bersih presentasi dan uji tanya jawab bersama juri nasional independen.',
                                            'location' => 'DiLO Yogyakarta / Hybrid',
                                            'tag' => 'Mentoring Juri',
                                        ],
                                        [
                                            'month' => 'MEI',
                                            'day' => '18',
                                            'title' => 'Simulasi Pitching Delegasi Nasional',
                                            'desc' => 'Gladi bersih presentasi dan uji tanya jawab bersama juri nasional independen.',
                                            'location' => 'DiLO Yogyakarta / Hybrid',
                                            'tag' => 'Mentoring Juri',
                                        ],
                                        [
                                            'month' => 'MEI',
                                            'day' => '18',
                                            'title' => 'Simulasi Pitching Delegasi Nasional',
                                            'desc' => 'Gladi bersih presentasi dan uji tanya jawab bersama juri nasional independen.',
                                            'location' => 'DiLO Yogyakarta / Hybrid',
                                            'tag' => 'Mentoring Juri',
                                        ],
                                        [
                                            'month' => 'MEI',
                                            'day' => '18',
                                            'title' => 'Simulasi Pitching Delegasi Nasional',
                                            'desc' => 'Gladi bersih presentasi dan uji tanya jawab bersama juri nasional independen.',
                                            'location' => 'DiLO Yogyakarta / Hybrid',
                                            'tag' => 'Mentoring Juri',
                                        ],
                                    ];
                                @endphp

                                @foreach ($agendaItems as $idx => $agenda)
                                    <div class="flex items-start gap-4 pb-4 {{ $idx < count($agendaItems) - 1 ? 'border-b border-slate-100' : '' }} hover:bg-slate-50/50 p-2 rounded-2xl transition-colors">
                                        <!-- Lavender Date Box -->
                                        <div class="w-14 h-14 bg-[#F8F0FF] rounded-2xl flex flex-col items-center justify-center flex-shrink-0 border border-[#F3E8FF]">
                                            <span class="text-[10px] font-bold text-[#9333EA] tracking-wide uppercase">{{ $agenda['month'] }}</span>
                                            <span class="text-xl font-black text-[#9333EA] leading-none mt-0.5">{{ $agenda['day'] }}</span>
                                        </div>

                                        <!-- Event Details -->
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-center justify-between gap-2 flex-wrap">
                                                <h4 class="font-bold text-[#1F1F1F] text-sm sm:text-base truncate">
                                                    {{ $agenda['title'] }}
                                                </h4>
                                                <span class="bg-[#FDF4FF] text-[#C026D3] border border-[#F5D0FE] text-[10px] font-semibold px-2.5 py-0.5 rounded-full flex-shrink-0">
                                                    {{ $agenda['tag'] }}
                                                </span>
                                            </div>
                                            <p class="text-xs text-[#707070] mt-1 leading-relaxed">
                                                {{ $agenda['desc'] }}
                                            </p>
                                            <div class="flex items-center gap-1.5 text-[11px] text-[#707070] mt-1.5 font-medium">
                                                <svg class="w-3.5 h-3.5 text-[#004ADA]" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                                </svg>
                                                <span>{{ $agenda['location'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Headline, Points & Calendar Action -->
                    <div class="lg:col-span-6 text-white reveal-on-scroll">
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-tight tracking-tight">
                            Jangan Lewatkan<br>
                            Momentum Inovasi Digital<br>
                            di UGM
                        </h2>

                        <p class="text-white/85 text-sm sm:text-base leading-relaxed mt-6 max-w-xl">
                            Seluruh linimasa kegiatan telah terintegrasi dengan kalender akademik universitas dan Puspresnas. Mahasiswa terdaftar dapat mengaktifkan notifikasi pengingat otomatis agar tidak terlewat sesi bootcamp, pembinaan, maupun tenggat submission.
                        </p>

                        <!-- 3 Checkmark Bullet Points -->
                        <div class="space-y-4 mt-8">
                            <div class="flex items-start gap-3.5">
                                <div class="w-5 h-5 rounded-full bg-[#FEA515] flex items-center justify-center flex-shrink-0 text-white mt-0.5 shadow-sm">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <span class="text-sm sm:text-base text-white/95 font-medium">
                                    Pengingat otomatis H-3 deadline pengumpulan berkas
                                </span>
                            </div>

                            <div class="flex items-start gap-3.5">
                                <div class="w-5 h-5 rounded-full bg-[#FEA515] flex items-center justify-center flex-shrink-0 text-white mt-0.5 shadow-sm">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <span class="text-sm sm:text-base text-white/95 font-medium">
                                    Tautan langsung Google Meet untuk sesi mentoring virtual
                                </span>
                            </div>

                            <div class="flex items-start gap-3.5">
                                <div class="w-5 h-5 rounded-full bg-[#FEA515] flex items-center justify-center flex-shrink-0 text-white mt-0.5 shadow-sm">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <span class="text-sm sm:text-base text-white/95 font-medium">
                                    Akses materi presentasi & rekaman kurikulum pasca acara
                                </span>
                            </div>
                        </div>

                        <!-- CTA Button: Google Calendar -->
                        <div class="mt-10">
                            <a href="https://calendar.google.com" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-3 bg-white text-[#004ADA] hover:bg-slate-50 font-bold px-7 py-3.5 rounded-2xl shadow-xl hover:shadow-2xl hover:scale-105 active:scale-95 transition-all text-sm sm:text-base">
                                <svg class="w-5 h-5 text-[#004ADA]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>Simpan ke Google Calendar</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============================================= --}}
        {{-- SECTION 4: GALERI AKTIVITAS & DOKUMENTASI     --}}
        {{-- ============================================= --}}
        <section id="galeri" class="py-20 lg:py-28 relative bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="mb-12 sm:mb-16 reveal-on-scroll">
                    <h2 class="text-3xl sm:text-4xl lg:text-[42px] font-extrabold text-[#1F1F1F] leading-[1.18] tracking-tight">
                        Galeri Aktivitas &<br>
                        Dokumentasi Mahasiswa
                    </h2>
                    <p class="text-sm sm:text-base text-[#707070] mt-3.5 max-w-2xl leading-relaxed">
                        Kilasan momen dedikasi mahasiswa KMID UGM dalam riset produk digital, ajang perlombaan tingkat nasional, hingga penganugerahan kejuaraan.
                    </p>
                </div>

                <!-- Gallery Cards Grid -->
                <div class="space-y-6">
                    <!-- Top Row: 2 Large Cards -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Card 1: UI/UX Clinic -->
                        <div class="group relative rounded-3xl overflow-hidden aspect-[16/10] sm:aspect-[16/9.5] shadow-md hover:shadow-2xl transition-all duration-500 reveal-on-scroll">
                            <img src="{{ asset('images/desainKMID/Hi-fi-design/activity_img_0.png') }}" alt="Hands-on UI/UX Prototyping" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <!-- Dark Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/50 to-transparent"></div>
                            
                            <!-- Content at Bottom -->
                            <div class="absolute inset-0 p-6 sm:p-8 flex flex-col justify-end text-white">
                                <div class="flex items-center gap-2.5 flex-wrap mb-2">
                                    <span class="bg-[#FEA515] text-white text-[11px] font-bold px-2.5 py-1 rounded-md tracking-wider uppercase">
                                        LAB INOVASI
                                    </span>
                                    <span class="text-white/80 text-xs font-normal">
                                        Laboratorium Terpadu Gedung Tahir UGM
                                    </span>
                                </div>
                                <h3 class="text-xl sm:text-2xl font-bold text-white leading-snug">
                                    Hands-on UI/UX Prototyping & Modern Frontend Clinic
                                </h3>
                                <p class="text-white/75 text-xs sm:text-sm mt-2 line-clamp-2 max-w-xl leading-relaxed">
                                    Sesi mentoring intensif pembedahan desain sistem atomik dan pengkabelan API bersama mahasiswa Sekolah Vokasi dan Fasilkom.
                                </p>
                            </div>
                        </div>

                        <!-- Card 2: Juara Umum LIDM -->
                        <div class="group relative rounded-3xl overflow-hidden aspect-[16/10] sm:aspect-[16/9.5] shadow-md hover:shadow-2xl transition-all duration-500 reveal-on-scroll">
                            <img src="{{ asset('images/desainKMID/Hi-fi-design/activity_img_0.png') }}" alt="Penganugerahan Juara Umum Delegasi KMID UGM" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <!-- Dark Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/50 to-transparent"></div>
                            
                            <!-- Content at Bottom -->
                            <div class="absolute inset-0 p-6 sm:p-8 flex flex-col justify-end text-white">
                                <div class="flex items-center gap-2.5 flex-wrap mb-2">
                                    <span class="bg-[#004ADA] text-white text-[11px] font-bold px-2.5 py-1 rounded-md tracking-wider uppercase">
                                        PODIUM PRESTASI
                                    </span>
                                    <span class="text-white/80 text-xs font-normal">
                                        Puspresnas Kemdikbudristek
                                    </span>
                                </div>
                                <h3 class="text-xl sm:text-2xl font-bold text-white leading-snug">
                                    Penganugerahan Juara Umum Delegasi KMID UGM
                                </h3>
                                <p class="text-white/75 text-xs sm:text-sm mt-2 line-clamp-2 max-w-xl leading-relaxed">
                                    Kemenangan membanggakan kontingen inovasi digital UGM membawa pulang medali emas dan penghargaan poster terbaik.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Row: 3 Medium Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Card 3: Affinity Mapping -->
                        <div class="group relative rounded-3xl overflow-hidden aspect-[4/3] sm:aspect-[16/11] shadow-md hover:shadow-2xl transition-all duration-500 reveal-on-scroll">
                            <img src="{{ asset('images/desainKMID/Hi-fi-design/activity_img_1.jpeg') }}" alt="Affinity Mapping Ide Solusi" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/50 to-transparent"></div>
                            
                            <div class="absolute inset-0 p-5 sm:p-6 flex flex-col justify-end text-white">
                                <span class="bg-white/20 backdrop-blur-md text-white text-[10px] font-semibold px-2.5 py-0.5 rounded-md inline-block w-fit uppercase tracking-wider mb-2">
                                    DESIGN SPRINT
                                </span>
                                <h4 class="text-base sm:text-lg font-bold text-white leading-snug">
                                    Affinity Mapping Ide Solusi
                                </h4>
                                <p class="text-white/75 text-xs mt-1 leading-relaxed">
                                    Sesi 48 jam validasi pain point civitas kampus.
                                </p>
                            </div>
                        </div>

                        <!-- Card 4: Pitch Deck Presentation -->
                        <div class="group relative rounded-3xl overflow-hidden aspect-[4/3] sm:aspect-[16/11] shadow-md hover:shadow-2xl transition-all duration-500 reveal-on-scroll">
                            <img src="{{ asset('images/desainKMID/Hi-fi-design/activity_img_2.jpeg') }}" alt="Pitch Deck Live Presentation" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/50 to-transparent"></div>
                            
                            <div class="absolute inset-0 p-5 sm:p-6 flex flex-col justify-end text-white">
                                <span class="bg-white/20 backdrop-blur-md text-white text-[10px] font-semibold px-2.5 py-0.5 rounded-md inline-block w-fit uppercase tracking-wider mb-2">
                                    DEMO DAY
                                </span>
                                <h4 class="text-base sm:text-lg font-bold text-white leading-snug">
                                    Pitch Deck Live Presentation
                                </h4>
                                <p class="text-white/75 text-xs mt-1 leading-relaxed">
                                    Demo prototipe aplikasi di depan kurator industri.
                                </p>
                            </div>
                        </div>

                        <!-- Card 5: Welcoming Party -->
                        <div class="group relative rounded-3xl overflow-hidden aspect-[4/3] sm:aspect-[16/11] shadow-md hover:shadow-2xl transition-all duration-500 reveal-on-scroll">
                            <img src="{{ asset('images/desainKMID/Hi-fi-design/activity_img_0.png') }}" alt="Temu Akrab & Welcoming Party" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/50 to-transparent"></div>
                            
                            <div class="absolute inset-0 p-5 sm:p-6 flex flex-col justify-end text-white">
                                <span class="bg-white/20 backdrop-blur-md text-white text-[10px] font-semibold px-2.5 py-0.5 rounded-md inline-block w-fit uppercase tracking-wider mb-2">
                                    COMMUNITY
                                </span>
                                <h4 class="text-base sm:text-lg font-bold text-white leading-snug">
                                    Temu Akrab & Welcoming Party
                                </h4>
                                <p class="text-white/75 text-xs mt-1 leading-relaxed">
                                    Membangun koneksi lintas angkatan di Gelanggang UGM.
                                </p>
                            </div>
                        </div>
                    </div>
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
                            <li><a href="{{ route('home') }}#achievements" class="text-blue-100/80 hover:text-white transition-colors">Impact</a></li>
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

    <!-- Interactive JS for Month Filter Tabs in Activities -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabs = document.querySelectorAll('.month-tab-btn');
            const monthLabel = document.getElementById('current-month-label');
            const monthNames = {
                'mar': 'Maret — Juni 2025',
                'apr': 'April 2025',
                'mei': 'Mei 2025',
                'jun': 'Juni 2025'
            };

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    const month = tab.getAttribute('data-month');
                    tabs.forEach(t => {
                        t.classList.remove('bg-[#004ADA]', 'text-white', 'shadow-sm');
                        t.classList.add('text-[#707070]');
                    });
                    tab.classList.remove('text-[#707070]');
                    tab.classList.add('bg-[#004ADA]', 'text-white', 'shadow-sm');
                    if (monthLabel && monthNames[month]) {
                        monthLabel.textContent = monthNames[month];
                    }
                });
            });
        });
    </script>
</body>
</html>
