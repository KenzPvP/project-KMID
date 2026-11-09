<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin KMID - Pengelolaan Konten')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
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

    <div class="flex-1 flex flex-col md:flex-row min-h-screen relative">
        
        <!-- Mobile Sidebar Backdrop -->
        <div id="sidebar-backdrop" class="fixed inset-0 bg-black/40 z-30 hidden md:hidden transition-opacity"></div>

        <!-- ============================================================== -->
        <!-- SIDEBAR                                                        -->
        <!-- ============================================================== -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 -translate-x-full md:translate-x-0 md:static w-72 shrink-0 bg-white border-r border-[#EEEEEE] flex flex-col justify-between z-40 transition-transform duration-300 ease-in-out">
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

                <!-- Navigation Section -->
                <div class="px-5 pt-6 pb-2">
                    <span class="text-[11px] font-semibold text-[#8E8E93] uppercase tracking-wider block mb-3">PENGELOLAAN KONTEN</span>
                    
                    <nav class="space-y-1.5">
                        <!-- Menu 1: Kepengurusan -->
                        <a href="{{ route('admin.kepengurusan') }}" class="w-full flex items-center justify-between px-3.5 py-3 rounded-xl transition-all duration-200 text-left group {{ request()->routeIs('admin.kepengurusan') ? 'bg-[#EBF2FE] text-[#004ADA] font-semibold' : 'text-[#707070] font-medium hover:bg-slate-50 hover:text-[#1F1F1F]' }}">
                            <div class="flex items-center gap-3">
                                <!-- Users / Org Icon -->
                                <div class="w-5 h-5 shrink-0 flex items-center justify-center">
                                    <svg class="w-5 h-5 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <span class="text-xs sm:text-sm tracking-tight">Kepengurusan</span>
                            </div>
                            <div class="w-1.5 h-6 bg-[#004ADA] rounded-full {{ request()->routeIs('admin.kepengurusan') ? 'block' : 'hidden' }}"></div>
                        </a>

                        <!-- Menu 2: Galeri Aktivitas -->
                        <a href="{{ route('admin.galeri-aktivitas') }}" class="w-full flex items-center justify-between px-3.5 py-3 rounded-xl transition-all duration-200 text-left group {{ (request()->routeIs('admin.galeri-aktivitas') || request()->routeIs('admin.galeri-aktivitas.edit')) ? 'bg-[#EBF2FE] text-[#004ADA] font-semibold' : 'text-[#707070] font-medium hover:bg-slate-50 hover:text-[#1F1F1F]' }}">
                            <div class="flex items-center gap-3">
                                <!-- Photo / Gallery Icon -->
                                <div class="w-5 h-5 shrink-0 flex items-center justify-center">
                                    <svg class="w-5 h-5 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <span class="text-xs sm:text-sm tracking-tight">Galeri Aktivitas</span>
                            </div>
                            <div class="w-1.5 h-6 bg-[#004ADA] rounded-full {{ (request()->routeIs('admin.galeri-aktivitas') || request()->routeIs('admin.galeri-aktivitas.edit')) ? 'block' : 'hidden' }}"></div>
                        </a>

                        <!-- Menu 3: Prestasi LIDM -->
                        <a href="{{ route('admin.prestasi-lidm') }}" class="w-full flex items-center justify-between px-3.5 py-3 rounded-xl transition-all duration-200 text-left group {{ request()->routeIs('admin.prestasi-lidm') ? 'bg-[#EBF2FE] text-[#004ADA] font-semibold' : 'text-[#707070] font-medium hover:bg-slate-50 hover:text-[#1F1F1F]' }}">
                            <div class="flex items-center gap-3">
                                <!-- Trophy Icon -->
                                <div class="w-5 h-5 shrink-0 flex items-center justify-center">
                                    <svg class="w-5 h-5 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                    </svg>
                                </div>
                                <span class="text-xs sm:text-sm tracking-tight">Prestasi LIDM</span>
                            </div>
                            <div class="w-1.5 h-6 bg-[#004ADA] rounded-full {{ request()->routeIs('admin.prestasi-lidm') ? 'block' : 'hidden' }}"></div>
                        </a>

                        <!-- Menu 4: Info Kompetisi Nasional -->
                        <a href="{{ route('admin.info-kompetisi') }}" class="w-full flex items-center justify-between px-3.5 py-3 rounded-xl transition-all duration-200 text-left group {{ request()->routeIs('admin.info-kompetisi') ? 'bg-[#EBF2FE] text-[#004ADA] font-semibold' : 'text-[#707070] font-medium hover:bg-slate-50 hover:text-[#1F1F1F]' }}">
                            <div class="flex items-center gap-3">
                                <!-- Megaphone / Announce Icon -->
                                <div class="w-5 h-5 shrink-0 flex items-center justify-center">
                                    <svg class="w-5 h-5 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                                    </svg>
                                </div>
                                <span class="text-xs sm:text-sm tracking-tight">Info Kompetisi Nasional</span>
                            </div>
                            <div class="w-1.5 h-6 bg-[#004ADA] rounded-full {{ request()->routeIs('admin.info-kompetisi') ? 'block' : 'hidden' }}"></div>
                        </a>

                        <!-- Menu 5: Persyaratan & Guidebook -->
                        <a href="{{ route('admin.persyaratan-guidebook') }}" class="w-full flex items-center justify-between px-3.5 py-3 rounded-xl transition-all duration-200 text-left group {{ request()->routeIs('admin.persyaratan-guidebook') ? 'bg-[#EBF2FE] text-[#004ADA] font-semibold' : 'text-[#707070] font-medium hover:bg-slate-50 hover:text-[#1F1F1F]' }}">
                            <div class="flex items-center gap-3">
                                <!-- Book Open Icon -->
                                <div class="w-5 h-5 shrink-0 flex items-center justify-center">
                                    <svg class="w-5 h-5 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                                <span class="text-xs sm:text-sm tracking-tight">Persyaratan & Guidebook</span>
                            </div>
                            <div class="w-1.5 h-6 bg-[#004ADA] rounded-full {{ request()->routeIs('admin.persyaratan-guidebook') ? 'block' : 'hidden' }}"></div>
                        </a>
                    </nav>
                </div>
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
            
            <!-- Fixed Background Ornament Overlay -->
            <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden" aria-hidden="true">
                <img src="{{ asset('images/desainKMID/Hi-fi-design/ornamentBackground.png') }}" 
                     alt="" 
                     class="w-full h-full object-cover object-center opacity-85">
            </div>

            <!-- TOP NAVBAR -->
            <header class="h-16 lg:h-18 bg-white border-b border-[#EEEEEE] flex items-center justify-between px-4 sm:px-8 lg:px-10 z-20 shrink-0">
                <!-- Left: Breadcrumb / Page Title & Sidebar Toggle -->
                <div class="flex items-center gap-3">
                    <button type="button" id="sidebar-toggle-btn" class="md:hidden p-1.5 rounded-lg text-gray-500 hover:text-gray-800 hover:bg-gray-100" aria-label="Toggle menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>

                    <!-- Icon [ | ] (Sidebar toggle / split layout icon) -->
                    <div class="hidden sm:flex items-center text-[#707070]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <rect x="3" y="4" width="18" height="16" rx="2" stroke-width="1.8"/>
                            <path stroke-linecap="round" stroke-width="1.8" d="M9 4v16"/>
                        </svg>
                    </div>

                    <span class="text-xs sm:text-sm font-normal text-[#707070]">
                        @yield('topbar_breadcrumb', 'Admin KMID')
                    </span>
                </div>

                <!-- Right: Notifications & Profile Details -->
                <div class="flex items-center gap-3 sm:gap-6">
                    <!-- Notification Bell -->
                    <button type="button" class="p-2 text-gray-400 hover:text-gray-600 transition-colors relative" aria-label="Notifikasi">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                    </button>

                    <!-- User Profile Item (Administrator) -->
                    <div class="flex items-center gap-3 pl-2 sm:pl-3 border-l border-gray-100">
                        <!-- Profile Avatar -->
                        <div class="w-8 sm:w-9 h-8 sm:h-9 rounded-full bg-[#004ADA] text-white font-bold flex items-center justify-center text-xs sm:text-sm shadow-sm select-none">
                            T
                        </div>
                        <!-- Profile Texts -->
                        <div class="hidden sm:block text-left leading-tight">
                            <div class="text-xs sm:text-sm font-semibold text-[#1F1F1F]">Tariq Hifzhillah</div>
                            <div class="text-[11px] text-[#9CA3AF]">Administrator</div>
                        </div>
                        <!-- Dropdown Chevron -->
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </div>
            </header>

            <!-- MAIN CONTENT AREA -->
            <main class="flex-1 px-4 sm:px-8 lg:px-12 py-8 sm:py-10 z-10 flex flex-col justify-between">
                <div>
                    @yield('content')
                </div>

                <!-- BOTTOM PAGE FOOTER (as in design) -->
                <footer class="mt-12 pt-6 border-t border-gray-200/80 flex flex-col sm:flex-row items-center justify-between text-xs text-[#8E8E93] gap-2">
                    <p>KMID UGM · Pengelolaan konten situs publik</p>
                    <p class="font-medium text-[#707070]">Tampilan admin</p>
                </footer>
            </main>

        </div>
    </div>

    <!-- Mobile Drawer Interaction Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');
            const toggleBtn = document.getElementById('sidebar-toggle-btn');
            const closeBtn = document.getElementById('sidebar-close-btn');

            function openSidebar() {
                sidebar.classList.remove('-translate-x-full');
                backdrop.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            }

            function closeSidebar() {
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }

            if (toggleBtn) toggleBtn.addEventListener('click', openSidebar);
            if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
            if (backdrop) backdrop.addEventListener('click', closeSidebar);
        });
    </script>
</body>
</html>
