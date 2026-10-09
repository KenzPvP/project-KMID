<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About | KMID - Komunitas Mahasiswa Inovasi Digital</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- STYLE KHUSUS NAVBAR + HERO (boleh dipindah ke resources/css/app.css) --}}
    <style>
        :root {
            --nav-h: 72px;
        }

        @media (min-width: 1024px) {
            :root {
                --nav-h: clamp(88px, 6.354vw, 122px);
            }
        }

        /* Glow putih di bawah teks hero (sama seperti efek shadow di desain Figma).
           Ukuran memakai cqw supaya ikut skala lebar hero. */
        .about-hero-glow {
            text-shadow:
                0 0.26cqw 0.57cqw rgba(255, 255, 255, .98),
                0 0.99cqw 0.99cqw rgba(255, 255, 255, .85),
                0 2.29cqw 1.35cqw rgba(255, 255, 255, .5),
                0 4.06cqw 1.61cqw rgba(255, 255, 255, .15),
                0 6.35cqw 1.77cqw rgba(255, 255, 255, .02);
        }
    </style>
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
                <a href="{{ route('home') }}" class="text-base font-medium text-[#1F1F1F] transition-colors hover:text-[#004ADA]">Home</a>
                <a href="{{ route('about') }}" class="text-base font-semibold text-[#004ADA] transition-colors hover:text-[#003FBA]">About</a>
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
            <a href="{{ route('home') }}" class="text-base font-medium text-[#1F1F1F] hover:text-[#004ADA]">Home</a>
            <a href="{{ route('about') }}" class="text-base font-semibold text-[#004ADA]">About</a>
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
        {{-- Spacer setinggi navbar (navbar bersifat fixed) --}}
        <div class="h-[var(--nav-h)]" aria-hidden="true"></div>

        {{-- ============================================= --}}
        {{-- SECTION 1: HERO (disesuaikan dengan desain Figma 1920 x 845) --}}
        {{-- ============================================= --}}
        <section
            class="@container relative isolate mx-auto w-full max-w-[1920px] overflow-hidden bg-white lg:aspect-[1920/845]">

            {{-- ===== Layer latar (desktop, koordinat dalam % dari frame 1920 x 845) ===== --}}
            <div class="pointer-events-none absolute inset-0 hidden lg:block" aria-hidden="true">
                <!-- 1. Pola wave/maze -->
                <img src="{{ asset('images/desainKMID/Hi-fi-design/Vector (2).svg') }}" alt=""
                    class="absolute inset-0 h-full w-full object-cover opacity-[0.42]">

                <!-- 2. Foto gedung (Grha Sabha Pramana) -->
                <img src="{{ asset('images/desainKMID/Hi-fi-design/about_hero_building.png') }}" alt=""
                    class="absolute left-[54.6875%] top-[-23.669%] w-[45.3125%] max-w-none">

                <!-- 3. Glow biru kiri-atas -->
                <div
                    class="absolute left-[-22.604%] top-[-99.408%] h-[111.01%] w-[65.052%] rotate-[-11.329deg] rounded-[50%] bg-[#0C5EFF] blur-[10.4167cqw]">
                </div>

                <!-- 4. Fade putih di sisi kiri foto -->
                <div
                    class="absolute inset-y-0 left-[48.177%] w-[29.896%] bg-[linear-gradient(to_left,rgba(255,255,255,0)_0%,rgba(255,255,255,0.62)_20.36%,#fff_76.56%,#fff_100%)]">
                </div>

                <!-- 5. Glow biru kanan-bawah (menebalkan warna biru di bagian bawah foto) -->
                <div
                    class="absolute left-[54.857%] top-[88.15%] h-[111.01%] w-[65.052%] rotate-[-4.827deg] rounded-[50%] bg-[#0C5EFF] blur-[10.4167cqw]">
                </div>
            </div>

            {{-- ===== Latar versi mobile / tablet ===== --}}
            <div class="pointer-events-none absolute inset-x-0 top-0 h-[70%] bg-linear-to-b from-[#6D9EFF] via-[#C9DCFF]/60 to-transparent lg:hidden"
                aria-hidden="true"></div>
            <img src="{{ asset('images/desainKMID/Hi-fi-design/Vector (2).svg') }}" alt=""
                class="pointer-events-none absolute inset-0 h-full w-full object-cover opacity-[0.42] lg:hidden"
                aria-hidden="true">

            {{-- ===== Konten ===== --}}
            <div
                class="relative z-10 px-4 pt-14 pb-10 sm:px-8 sm:pt-20 lg:absolute lg:left-[4.896%] lg:top-[27.81%] lg:p-0">
                <span
                    class="inline-flex items-center justify-center rounded bg-[#9EBFFF] px-5 py-2 text-sm font-semibold text-[#001E5A] lg:h-[2.183cqw] lg:w-[6.458cqw] lg:p-0 lg:text-[0.9375cqw]">About</span>

                <h1
                    class="about-hero-glow mt-4 text-4xl font-bold leading-[1.16] tracking-[-0.02em] text-[#333333] sm:text-5xl lg:mt-[0.45cqw] lg:text-[4.1667cqw]">
                    Komunitas Mahasiswa<br>Inovasi Digital
                </h1>

                <p
                    class="about-hero-glow mt-4 max-w-xl text-base leading-[1.5] text-[#00297A] sm:text-lg lg:mt-[1.865cqw] lg:whitespace-nowrap lg:text-[1.3542cqw]">
                    Wadah kolaborasi mahasiswa UGM untuk belajar, berinovasi,<br class="hidden lg:block">
                    dan mengembangkan ide inovasi digital yang aplikatif.
                </p>
            </div>

            {{-- ===== Foto gedung versi mobile / tablet ===== --}}
            <div class="relative h-64 overflow-hidden sm:h-80 lg:hidden">
                <img src="{{ asset('images/desainKMID/Hi-fi-design/about_hero_building.png') }}"
                    alt="Gedung Grha Sabha Pramana Universitas Gadjah Mada"
                    class="absolute inset-0 h-full w-full object-cover object-[center_72%]">
                <div class="absolute inset-0 bg-linear-to-b from-white via-white/30 to-[#0C5EFF]/30"></div>
            </div>
        </section>

        {{-- ============================================= --}}
        {{-- SECTION 2: BLUE INFO + STATS --}}
        {{-- ============================================= --}}
        <div class="pattern-bg">
            <section class="relative py-16 lg:py-20 overflow-hidden">
                <!-- Starburst decoration left -->
                <div class="absolute -top-16 -left-16 w-48 h-48 pointer-events-none">
                    <img src="{{ asset('images/desainKMID/Hi-fi-design/Star 3.svg') }}" alt=""
                        class="w-full h-full opacity-20 blur-[2px]">
                </div>
                <!-- Starburst decoration right bottom -->
                <div class="absolute -bottom-12 -right-8 w-40 h-40 pointer-events-none">
                    <img src="{{ asset('images/desainKMID/Hi-fi-design/Star 3 (1).svg') }}" alt=""
                        class="w-full h-full opacity-20 blur-[2px]">
                </div>

                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <!-- Left Text Content -->
                        <div class="text-[#1F1F1F]">
                            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold leading-tight mb-4">
                                Riset Terapan &<br>Inkubasi Kompetisi Nasional
                            </h2>
                            <p class="text-[#707070] text-sm sm:text-base leading-relaxed mb-8 max-w-lg">
                                Komunitas Mahasiswa Inovasi Digital (KMID) UGM merupakan unit binaan resmi di bawah
                                naungan Subdirektorat Kreativitas Mahasiswa, Direktorat Kemahasiswaan UGM. Kami
                                memposisikan diri sebagai jembatan interdisipliner antara mahasiswa rumpun Sains &
                                Teknologi, Sosio-Humaniora, serta Agro-Kesehatan.
                            </p>

                            <!-- Stats Row -->
                            <div class="flex flex-wrap gap-4 sm:gap-6">
                                <div
                                    class="bg-white rounded-xl px-5 py-4 text-center min-w-[90px] border border-slate-100 shadow-sm">
                                    <div class="text-3xl sm:text-4xl font-bold text-[#004ADA]">120<span
                                            class="text-[#FEA515]">+</span></div>
                                    <div class="text-xs text-[#707070] mt-1">Anggota Aktif</div>
                                </div>
                                <div
                                    class="bg-white rounded-xl px-5 py-4 text-center min-w-[90px] border border-slate-100 shadow-sm">
                                    <div class="text-3xl sm:text-4xl font-bold text-[#FEA515]">18</div>
                                    <div class="text-xs text-[#707070] mt-1">Fakultas & SV</div>
                                </div>
                                <div
                                    class="bg-white rounded-xl px-5 py-4 text-center min-w-[90px] border border-slate-100 shadow-sm">
                                    <div class="text-3xl sm:text-4xl font-bold text-[#004ADA]">5</div>
                                    <div class="text-xs text-[#707070] mt-1">Divisi Fungsional</div>
                                </div>
                                <div
                                    class="bg-white rounded-xl px-5 py-4 text-center min-w-[90px] border border-slate-100 shadow-sm">
                                    <div class="text-3xl sm:text-4xl font-bold text-[#FEA515]">100<span>%</span></div>
                                    <div class="text-xs text-[#707070] mt-1">Dedikasi untuk Inovasi</div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Image -->
                        <div class="flex justify-center lg:justify-end">
                            <div class="w-full max-w-md aspect-[4/3] rounded-xl bg-[radial-gradient(circle_at_90%_85%,rgba(60,126,255,0.65),transparent_24%),#004ADA] shadow-lg"
                                role="img" aria-label="Visual kegiatan KMID"></div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- ============================================= --}}
            {{-- SECTION 3: FEATURE CARDS (3 icons) --}}
            {{-- ============================================= --}}
            <section class="py-16 lg:py-20 relative">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="mb-8">
                        <h2 class="text-sm font-bold text-[#1F1F1F]">Pilar Kompetensi Utama</h2>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                        <!-- Feature 1 -->
                        <div class="flex gap-4 items-start bg-white rounded-lg p-4 shadow-sm reveal-on-scroll">
                            <div class="flex-shrink-0 w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-sm text-[#1F1F1F] mb-1">UX/UI & Product Design</h3>
                                <p class="text-xs text-[#707070] leading-relaxed">Eksplorasi Design Thinking, usability
                                    testing empiris, perancangan antarmuka, dan design system standar industri global.
                                </p>
                            </div>
                        </div>

                        <!-- Feature 2 -->
                        <div class="flex gap-4 items-start bg-white rounded-lg p-4 shadow-sm reveal-on-scroll">
                            <div
                                class="flex-shrink-0 w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-sm text-[#1F1F1F] mb-1">Software & Cloud Architecture</h3>
                                <p class="text-xs text-[#707070] leading-relaxed">Pengembangan web adaptif, backend
                                    scalable, integrasi cloud computing, serta implementasi AI/ML untuk otomasi layanan.
                                </p>
                            </div>
                        </div>

                        <!-- Feature 3 -->
                        <div class="flex gap-4 items-start bg-white rounded-lg p-4 shadow-sm reveal-on-scroll">
                            <div class="flex-shrink-0 w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-sm text-[#1F1F1F] mb-1">Product Strategy & Metrics</h3>
                                <p class="text-xs text-[#707070] leading-relaxed">Pengaturan alur kerja, analisis
                                    product-market fit, pengujian metrik adopsi pengguna, dan manajemen sprint proyek
                                    yang terukur.</p>
                            </div>
                        </div>
                        <div class="flex gap-4 items-start bg-white rounded-lg p-4 shadow-sm reveal-on-scroll">
                            <div
                                class="flex-shrink-0 w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-[#FEA515]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6l4 2m5-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-sm text-[#1F1F1F] mb-1">EdTech & LDM Puspresnas</h3>
                                <p class="text-xs text-[#707070] leading-relaxed">Spesialisasi riset pedagogi digital,
                                    microlearning interaktif, dan penguasaan 5 divisi cabang lomba nasional LIDM.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- ============================================= --}}
            {{-- SECTION 4: SEJARAH KMID (History) --}}
            {{-- ============================================= --}}
            <section class="py-16 lg:py-24 relative overflow-hidden">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                    <!-- Section Title -->
                    <div class="text-center mb-14 reveal-on-scroll">
                        <h2 class="section-heading text-[#004ADA]"
                            style="font-family: 'Plus Jakarta Sans', sans-serif; font-style: italic;">Sejarah KMID</h2>
                    </div>

                    <!-- Timeline Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-14">
                        <!-- Year 2018 -->
                        <div
                            class="bg-white rounded-2xl p-6 shadow-md border border-slate-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 reveal-on-scroll">
                            <span
                                class="inline-block bg-blue-50 text-[#004ADA] text-xs font-bold px-4 py-1.5 rounded-full mb-4">2022</span>
                            <h3 class="font-bold text-lg text-[#1F1F1F] mb-2">Fondasi Awal & Medali Pertama</h3>
                            <p class="text-sm text-[#707070] leading-relaxed">
                                Gagasan awal KMID diprakarsai oleh gabungan alumni tim delegasi UGM yang sukses merebut
                                medali dalam LIDM Puspresnas. Inisiasi sharing session santai mengenai kebutuhan
                                paguyuban inkubasi berkelanjutan.
                            </p>
                            <p class="mt-4 text-[10px] font-semibold text-[#004ADA]">Tonggak: 12 Anggota Pelopor</p>
                        </div>

                        <!-- Year 2019 -->
                        <div
                            class="bg-white rounded-2xl p-6 shadow-md border border-slate-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 reveal-on-scroll">
                            <span
                                class="inline-block bg-orange-100 text-[#9A5B00] text-xs font-bold px-4 py-1.5 rounded-full mb-4">2023</span>
                            <h3 class="font-bold text-lg text-[#1F1F1F] mb-2">Formalisasi Binaan Subdit Ditmawa</h3>
                            <p class="text-sm text-[#707070] leading-relaxed">
                                KMID resmi disahkan sebagai komunitas minat bakat & penalaran di bawah Subdirektorat
                                Kreativitas Mahasiswa UGM. Penyusunan AD/ART pertama dan sistem mentoring terstruktur
                                antar fakultas.
                            </p>
                            <p class="mt-4 text-[10px] font-semibold text-[#FEA515]">Tonggak: SK Resmi Pembinaan</p>
                        </div>

                        <!-- Year 2020 -->
                        <div
                            class="bg-white rounded-2xl p-6 shadow-md border border-slate-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 reveal-on-scroll">
                            <span
                                class="inline-block bg-blue-50 text-[#004ADA] text-xs font-bold px-4 py-1.5 rounded-full mb-4">2025</span>
                            <h3 class="font-bold text-lg text-[#1F1F1F] mb-2">Ekspansi Divisi & Bootcamp Kilat</h3>
                            <p class="text-sm text-[#707070] leading-relaxed">
                                Peluncuran program Digital Talent Bootcamp lintas prodi. Menghubungkan riset dosen
                                pembimbing dengan prototipe buatan mahasiswa, memperluas cakupan divisi dari UI/UX
                                hingga Software Cloud.
                            </p>
                            <p class="mt-4 text-[10px] font-semibold text-[#004ADA]">Tonggak: 80+ Delegasi Terlatih</p>
                        </div>

                        <!-- Year 2024 -->
                        <div
                            class="bg-white rounded-2xl p-6 shadow-md border border-slate-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 reveal-on-scroll">
                            <span
                                class="inline-block bg-[#004ADA] text-white text-xs font-bold px-4 py-1.5 rounded-full mb-4">2026</span>
                            <h3 class="font-bold text-lg text-[#1F1F1F] mb-2">Juara Umum & Hub Hilirisasi</h3>
                            <p class="text-sm text-[#707070] leading-relaxed">
                                KMID berhasil mengantarkan kontingen UGM menyabet predikat Juara Umum LIDM Puspresnas.
                                Melangkah lebih jauh ke arah akselerasi prototipe digital menjadi produk tepat guna bagi
                                masyarakat.
                            </p>
                            <p class="mt-4 text-[10px] font-semibold text-[#004ADA]">Tonggak: Rekor Juara Bertahan</p>
                        </div>
                    </div>

                    <!-- Photo Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 reveal-on-scroll">
                        @php
                            $historyGallery = ['Gelar Juara Divisi LIDM', 'Riset Kurikulum & User Research Sprint', 'Grand Launching & Onboarding Kepengurusan'];
                        @endphp
                        @foreach ($historyGallery as $photoTitle)
                            <figure>
                                <div class="aspect-[1.7/1] bg-[#C9C9C9] rounded-xl overflow-hidden"></div>
                                <figcaption class="mt-2 text-center text-[10px] text-[#474747]">{{ $photoTitle }}
                                </figcaption>
                            </figure>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>

        {{-- ============================================= --}}
        {{-- SECTION 5: VISI & MISI --}}
        {{-- ============================================= --}}
        <section class="relative isolate bg-[#004ADA] py-16 lg:py-24 overflow-hidden">
            <!-- Starburst decoration left -->
            <div class="absolute -top-36 -left-28 z-0 aspect-[215/504] w-[clamp(240px,31vw,600px)] pointer-events-none">
                <img src="{{ asset('images/desainKMID/Hi-fi-design/Star 2.svg') }}" alt=""
                    class="h-full w-full opacity-90 drop-shadow-[0_0_30px_rgba(254,165,21,0.4)]">
            </div>
            <!-- Starburst decoration right bottom -->
            <div
                class="absolute -bottom-12 -right-8 z-0 aspect-[150/227] w-[clamp(220px,28vw,520px)] pointer-events-none">
                <img src="{{ asset('images/desainKMID/Hi-fi-design/Star 3 (1).svg') }}" alt=""
                    class="h-full w-full opacity-90 drop-shadow-[0_0_20px_rgba(254,165,21,0.35)]">
            </div>

            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <!-- Section Title -->
                <div class="text-center mb-12 reveal-on-scroll">
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white italic"
                        style="font-family: 'Plus Jakarta Sans', sans-serif;">Visi & Misi</h2>
                </div>

                <!-- Visi Misi Cards - 2x2 grid -->
                <div class="relative z-20 grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- Visi -->
                    <div
                        class="bg-white rounded-xl p-6 border border-white/20 hover:-translate-y-1 transition-all duration-300 reveal-on-scroll">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center">
                                <span class="text-sm font-bold text-[#004ADA]">01</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-[#1F1F1F] mb-2">Membina Kompetensi Teknis & Design
                                    Thinking</h3>
                                <p class="text-sm text-[#707070] leading-relaxed">Menyelenggarakan kurikulum workshop,
                                    peer-learning, dan review portofolio secara intensif agar anggota menguasai standar
                                    teknologi industri terkini.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Misi 1 -->
                    <div
                        class="bg-white rounded-xl p-6 border border-white/20 hover:-translate-y-1 transition-all duration-300 reveal-on-scroll">
                        <div class="flex items-start gap-4">
                            <div
                                class="flex-shrink-0 w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                                <span class="text-sm font-bold text-[#FEA515]">02</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-[#1F1F1F] mb-2">Mengakselerasi Delegasi Kompetisi
                                    Nasional</h3>
                                <p class="text-sm text-[#707070] leading-relaxed">Menyiapkan tim kontingen unggulan UGM
                                    melalui simulasi berkala, bimbingan dosen pakar, dan bedah submisi rujukan resmi
                                    Puspresnas Kemendikbudristek.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Misi 2 -->
                    <div
                        class="bg-white rounded-xl p-6 border border-white/20 hover:-translate-y-1 transition-all duration-300 reveal-on-scroll">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center">
                                <span class="text-sm font-bold text-[#004ADA]">03</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-[#1F1F1F] mb-2">Membangun Kolaborasi Multidisipliner
                                    Nyata</h3>
                                <p class="text-sm text-[#707070] leading-relaxed">Merangkai gelar pakar dan merangkul
                                    pengetahuan mahasiswa informatika, desain, ilmu pendidikan, hingga humaniora dalam
                                    satu kesatuan produk sinergis.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Misi 3 -->
                    <div
                        class="bg-white rounded-xl p-6 border border-white/20 hover:-translate-y-1 transition-all duration-300 reveal-on-scroll">
                        <div class="flex items-start gap-4">
                            <div
                                class="flex-shrink-0 w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                                <span class="text-sm font-bold text-[#FEA515]">04</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-[#1F1F1F] mb-2">Mendorong Hilirisasi Solusi Digital
                                    Berdampak</h3>
                                <p class="text-sm text-[#707070] leading-relaxed">Menyalurkan produk purwarupa riset
                                    menjadi ekosistem komersil, mandiri diuji coba dan didistribusikan kepada sekolah,
                                    UMKM, dan masyarakat mitra.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============================================= --}}
        {{-- SECTION 6: STRUKTUR KEPENGURUSAN --}}
        {{-- ============================================= --}}
        <section class="py-16 lg:py-24 relative pattern-bg overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <!-- Section Title -->
                <div class="text-center mb-14 reveal-on-scroll">
                    <h2 class="section-heading text-[#004ADA]"
                        style="font-family: 'Plus Jakarta Sans', sans-serif; font-style: italic;">Struktur Kepengurusan
                    </h2>
                </div>

                <!-- Dewan Pembina Komunitas -->
                <div class="mb-12 reveal-on-scroll">
                    <div class="flex items-center gap-3 mb-6">
                        <svg class="w-5 h-5 text-[#004ADA]" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7" />
                        </svg>
                        <h3 class="text-lg font-bold text-[#1F1F1F]">Dewan Pembina Komunitas</h3>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-5xl">
                        <!-- Pembina 1 -->
                        <div
                            class="flex items-center gap-4 bg-white rounded-2xl p-5 shadow-md border border-slate-100 hover:shadow-lg transition-all duration-300">
                            <div
                                class="w-14 h-14 bg-[#E9E9E9] rounded-full flex-shrink-0 flex items-center justify-center overflow-hidden">
                                <img src="{{ asset('images/desainKMID/Hi-fi-design/Frame 1686560880.svg') }}" alt=""
                                    class="w-9 h-auto">
                            </div>
                            <div>
                                <span
                                    class="inline-block bg-blue-50 text-[#004ADA] text-[9px] font-semibold px-2 py-0.5 rounded-full mb-1">Dosen
                                    Pembina Utama</span>
                                <h4 class="font-bold text-sm text-[#1F1F1F]">Dr. Ir. Mardhani Prasetyo, M.Eng.</h4>
                                <p class="text-xs text-[#707070]">Departemen Teknik Elektro & Teknologi Informasi,
                                    Fakultas Teknik</p>
                            </div>
                        </div>

                        <!-- Pembina 2 -->
                        <div
                            class="flex items-center gap-4 bg-white rounded-2xl p-5 shadow-md border border-slate-100 hover:shadow-lg transition-all duration-300">
                            <div
                                class="w-14 h-14 bg-[#E9E9E9] rounded-full flex-shrink-0 flex items-center justify-center overflow-hidden">
                                <img src="{{ asset('images/desainKMID/Hi-fi-design/Frame 1686560880.svg') }}" alt=""
                                    class="w-9 h-auto">
                            </div>
                            <div>
                                <span
                                    class="inline-block bg-orange-100 text-[#9A5B00] text-[9px] font-semibold px-2 py-0.5 rounded-full mb-1">Penasihat
                                    Kemahasiswaan</span>
                                <h4 class="font-bold text-sm text-[#1F1F1F]">Tariq Hifzhillah, S.Kom., M.Cs.</h4>
                                <p class="text-xs text-[#707070]">Subdirektorat Kreativitas Mahasiswa, Ditmawa UGM</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Badan Pengurus Harian (BPH) -->
                <div class="mb-12 reveal-on-scroll">
                    <div class="flex items-center gap-3 mb-6">
                        <svg class="w-5 h-5 text-[#004ADA]" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7" />
                        </svg>
                        <h3 class="text-lg font-bold text-[#1F1F1F]">Badan Pengurus Harian (BPH)</h3>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                        @php
                            $bphMembers = [
                                ['name' => 'Ahmad Tariq Hifzhillah', 'role' => 'Ketua Umum', 'study' => 'Teknologi Informasi 2021 • Fakultas Teknik', 'email' => 'farhan.rayyan@mail.ugm.ac.id'],
                                ['name' => 'Ahmad Tariq Hifzhillah', 'role' => 'Wakil Ketua Umum', 'study' => 'Ilmu Komputer 2021 • FMIPA', 'email' => 'adinda.putri@mail.ugm.ac.id'],
                                ['name' => 'Ahmad Tariq Hifzhillah', 'role' => 'Sekretaris Jenderal', 'study' => 'Manajemen Kebijakan Publik 2022 • FISIPOL', 'email' => 'nadhira.alia@mail.ugm.ac.id'],
                                ['name' => 'Ahmad Tariq Hifzhillah', 'role' => 'Bendahara Umum', 'study' => 'Akuntansi 2022 • Fakultas Ekonomika dan Bisnis', 'email' => 'bagus.dwi@mail.ugm.ac.id'],
                            ];
                        @endphp

                        @foreach ($bphMembers as $member)
                            <div
                                class="bg-white rounded-xl p-3 shadow-sm border border-slate-100 hover:shadow-lg transition-all duration-300">
                                <div class="w-full aspect-[1.15/1] bg-[#C9C9C9] rounded-lg mb-3"></div>
                                <span
                                    class="inline-block bg-blue-50 text-[#004ADA] text-[9px] font-semibold px-2 py-1 rounded-md mb-2">{{ $member['role'] }}</span>
                                <h4 class="font-bold text-sm text-[#1F1F1F] leading-tight">{{ $member['name'] }}</h4>
                                <p class="mt-1 text-[10px] leading-snug text-[#707070]">{{ $member['study'] }}</p>
                                <p class="mt-1 break-all text-[9px] text-[#707070]">{{ $member['email'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Kepala Divisi -->
                <div class="reveal-on-scroll">
                    <div class="flex items-center gap-3 mb-6">
                        <svg class="w-5 h-5 text-[#004ADA]" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7" />
                        </svg>
                        <h3 class="text-lg font-bold text-[#1F1F1F]">Kepala Divisi</h3>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-5">
                        @php
                            $divisionHeads = [
                                ['name' => 'Ahmad Tariq Hifzhillah', 'role' => 'Kadiv UI/UX & Product', 'study' => 'Teknologi Rekayasa Perangkat Lunak 2022 • Sekolah Vokasi', 'detail' => 'Mengampu 24 Desainer Aktif'],
                                ['name' => 'Ahmad Tariq Hifzhillah', 'role' => 'Kadiv Software & Cloud', 'study' => 'Ilmu Komputer 2021 • FMIPA', 'detail' => 'Mengampu 32 Engineers'],
                                ['name' => 'Ahmad Tariq Hifzhillah', 'role' => 'Kadiv Riset & EdTech', 'study' => 'Teknologi Informasi 2022 • Fakultas Teknik', 'detail' => 'Mengampu 36 Riset Delegasi'],
                                ['name' => 'Ahmad Tariq Hifzhillah', 'role' => 'Kadiv Kemitraan & PR', 'study' => 'Ilmu Komunikasi 2022 • FISIPOL', 'detail' => 'Mengampu 18 Publikasi & Liaison'],
                            ];
                        @endphp

                        @foreach ($divisionHeads as $head)
                            <div
                                class="bg-white rounded-xl p-3 shadow-sm border border-slate-100 hover:shadow-lg transition-all duration-300">
                                <div class="w-full aspect-[1.15/1] bg-[#C9C9C9] rounded-lg mb-3"></div>
                                <span
                                    class="inline-block bg-blue-50 text-[#004ADA] text-[9px] font-semibold px-2 py-1 rounded-md mb-2">{{ $head['role'] }}</span>
                                <h4 class="font-bold text-sm text-[#1F1F1F] leading-tight">{{ $head['name'] }}</h4>
                                <p class="mt-1 text-[10px] leading-snug text-[#707070]">{{ $head['study'] }}</p>
                                <p class="mt-1 text-[10px] text-[#707070]">{{ $head['detail'] }}</p>
                            </div>
                        @endforeach
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
                        <img src="{{ asset('images/desainKMID/Hi-fi-design/Frame 1686560881.svg') }}"
                            alt="KMID Footer Logo" class="h-12 w-auto brightness-0 invert">
                    </a>
                    <address class="not-italic text-blue-100/80 text-sm sm:text-base leading-relaxed max-w-md">
                        Bulaksumur, Caturtunggal, Kapanewon Depok,<br>
                        Kabupaten Sleman, Daerah Istimewa<br>
                        Yogyakarta 55281.
                    </address>

                    <!-- Social Media Links -->
                    <div class="flex items-center gap-3 mt-6">
                        <a href="https://instagram.com" target="_blank" rel="noopener noreferrer"
                            class="w-10 h-10 bg-[#0C5EFF] hover:bg-[#3C7EFF] rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-105 active:scale-95 shadow-md"
                            aria-label="Instagram KMID">
                            <svg class="w-5 h-5 fill-current text-white" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                        <a href="https://youtube.com" target="_blank" rel="noopener noreferrer"
                            class="w-10 h-10 bg-[#0C5EFF] hover:bg-[#3C7EFF] rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-105 active:scale-95 shadow-md"
                            aria-label="YouTube KMID">
                            <svg class="w-5 h-5 fill-current text-white" viewBox="0 0 24 24">
                                <path
                                    d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                            </svg>
                        </a>
                        <a href="https://x.com" target="_blank" rel="noopener noreferrer"
                            class="w-10 h-10 bg-[#0C5EFF] hover:bg-[#3C7EFF] rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-105 active:scale-95 shadow-md"
                            aria-label="X KMID">
                            <svg class="w-4 h-4 fill-current text-white" viewBox="0 0 24 24">
                                <path
                                    d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                            </svg>
                        </a>
                        <a href="https://tiktok.com" target="_blank" rel="noopener noreferrer"
                            class="w-10 h-10 bg-[#0C5EFF] hover:bg-[#3C7EFF] rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-105 active:scale-95 shadow-md"
                            aria-label="TikTok KMID">
                            <svg class="w-4 h-4 fill-current text-white" viewBox="0 0 24 24">
                                <path
                                    d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.82.56-1.36 1.52-1.4 2.52-.06 1.25.54 2.49 1.54 3.19 1 .7 2.37.82 3.46.3 1.02-.48 1.71-1.5 1.77-2.62.06-2.96.02-5.92.03-8.88 0-3.08-.01-6.16.01-9.24z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Right Nav Columns -->
                <div class="lg:col-span-5 grid grid-cols-2 gap-8">
                    <div>
                        <h4 class="font-bold text-base text-white mb-4 tracking-wider">Page</h4>
                        <ul class="space-y-2.5 text-sm">
                            <li><a href="{{ route('home') }}"
                                    class="text-blue-100/80 hover:text-white transition-colors">Home</a></li>
                            <li><a href="{{ route('about') }}"
                                    class="text-blue-100/80 hover:text-white transition-colors">About</a></li>
                            <li><a href="{{ route('home') }}#program"
                                    class="text-blue-100/80 hover:text-white transition-colors">Activities</a></li>
                            <li><a href="{{ route('home') }}#achievements"
                                    class="text-blue-100/80 hover:text-white transition-colors">Impact</a></li>
                            <li><a href="{{ route('home') }}#faq"
                                    class="text-blue-100/80 hover:text-white transition-colors">Information</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold text-base text-white mb-4 tracking-wider">Support</h4>
                        <ul class="space-y-2.5 text-sm">
                            <li><a href="{{ route('home') }}#faq"
                                    class="text-blue-100/80 hover:text-white transition-colors">FAQ</a></li>
                            <li><a href="mailto:kmid@ugm.ac.id"
                                    class="text-blue-100/80 hover:text-white transition-colors">Contact</a></li>
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