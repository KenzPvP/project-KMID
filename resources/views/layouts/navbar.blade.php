@if(request()->routeIs('login', 'register'))
    <!-- AUTH SITE HEADER / NAVBAR (Exact Match with Figma UI/UX Design) -->
    <header id="site-header" class="w-full py-5 sm:py-8 px-4 sm:px-12 lg:px-20 relative z-30 transition-all duration-300">
        <div class="w-full max-w-[1440px] mx-auto flex items-center justify-between">
            <!-- Back Arrow Button -->
            <a href="{{ route('home') }}" class="inline-flex items-center justify-center p-2 rounded-xl text-[#1F1F1F] hover:text-[#004ADA] hover:bg-slate-100/60 transition-all duration-200 group focus:outline-none focus:ring-2 focus:ring-blue-500/20" aria-label="Kembali ke Beranda">
                <svg class="w-6 h-6 sm:w-8 sm:h-8 transform transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>

            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="inline-block transition-transform duration-300 hover:scale-105" aria-label="KMID Home">
                <img src="{{ asset('images/desainKMID/Hi-fi-design/Frame 1686560881.svg') }}" alt="KMID - Komunitas Mahasiswa Inovasi Digital" class="h-8 sm:h-11 w-auto">
            </a>
        </div>
    </header>
@else
    <!-- SITE HEADER / NAVBAR -->
    <header id="site-header" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 py-5 px-4 sm:px-8 lg:px-16">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="inline-block transition-transform duration-300 hover:scale-105" aria-label="KMID Home">
                <img src="{{ asset('images/desainKMID/Hi-fi-design/Frame 1686560881.svg') }}" alt="KMID - Komunitas Mahasiswa Inovasi Digital" class="h-10 sm:h-12 w-auto">
            </a>

            <!-- Desktop Nav Links -->
            <nav class="hidden md:flex items-center gap-8 lg:gap-10">
                <a href="{{ route('home') }}" @class([
                    'text-base font-semibold text-[#004ADA] transition-colors hover:text-[#003FBA]' => request()->routeIs('home'),
                    'text-base font-medium text-[#1F1F1F] transition-colors hover:text-[#004ADA]' => !request()->routeIs('home'),
                ]) @if(request()->routeIs('home')) aria-current="page" @endif>Home</a>
                <a href="{{ route('about') }}" @class([
                    'text-base font-semibold text-[#004ADA] transition-colors hover:text-[#003FBA]' => request()->routeIs('about'),
                    'text-base font-medium text-[#1F1F1F] transition-colors hover:text-[#004ADA]' => !request()->routeIs('about'),
                ]) @if(request()->routeIs('about')) aria-current="page" @endif>About</a>
                <a href="{{ route('activities') }}" @class([
                    'text-base font-semibold text-[#004ADA] transition-colors hover:text-[#003FBA]' => request()->routeIs('activities'),
                    'text-base font-medium text-[#1F1F1F] transition-colors hover:text-[#004ADA]' => !request()->routeIs('activities'),
                ]) @if(request()->routeIs('activities')) aria-current="page" @endif>Activities</a>
                <a href="{{ route('impact') }}" @class([
                    'text-base font-semibold text-[#004ADA] transition-colors hover:text-[#003FBA]' => request()->routeIs('impact'),
                    'text-base font-medium text-[#1F1F1F] transition-colors hover:text-[#004ADA]' => !request()->routeIs('impact'),
                ]) @if(request()->routeIs('impact')) aria-current="page" @endif>Impact</a>
                <a href="{{ route('information') }}" @class([
                    'text-base font-semibold text-[#004ADA] transition-colors hover:text-[#003FBA]' => request()->routeIs('information'),
                    'text-base font-medium text-[#1F1F1F] transition-colors hover:text-[#004ADA]' => !request()->routeIs('information'),
                ]) @if(request()->routeIs('information')) aria-current="page" @endif>Information</a>
            </nav>

            <!-- CTA Button -->
            <div class="hidden md:block">
                @auth
                    @if(auth()->user()->role === 'admin')
                        <div class="flex items-center gap-2">
                            <a href="{{ route('open-recruitment') }}" class="inline-flex items-center justify-center px-4 py-2 border border-[#004ADA] text-[#004ADA] hover:bg-blue-50 font-semibold text-xs rounded-full transition-all">
                                Portal Oprec
                            </a>
                            <a href="{{ route('admin.pendaftar.index') }}" class="inline-flex items-center justify-center px-5 py-2.5 bg-[#004ADA] text-white font-semibold text-xs rounded-full transition-all duration-300 hover:bg-[#003bb0] hover:shadow-lg hover:shadow-blue-500/25 active:scale-95">
                                Dashboard Admin
                            </a>
                        </div>
                    @elseif(auth()->user()->role === 'staff')
                        <div class="flex items-center gap-2">
                            <a href="{{ route('open-recruitment') }}" class="inline-flex items-center justify-center px-4 py-2 border border-[#FEA515] text-[#FEA515] hover:bg-amber-50 font-semibold text-xs rounded-full transition-all">
                                Portal Oprec
                            </a>
                            <a href="{{ route('staff.pendaftar.index') }}" class="inline-flex items-center justify-center px-5 py-2.5 bg-[#FEA515] text-white font-semibold text-xs rounded-full transition-all duration-300 hover:bg-[#EE9401] hover:shadow-lg hover:shadow-orange-500/25 active:scale-95">
                                Dashboard Staff
                            </a>
                        </div>
                    @else
                        <a href="{{ route('open-recruitment') }}" class="inline-flex items-center justify-center px-6 py-2.5 bg-[#FEA515] text-white font-semibold text-sm rounded-full transition-all duration-300 hover:bg-[#EE9401] hover:shadow-lg hover:shadow-orange-500/25 active:scale-95">
                            Dashboard Oprec
                        </a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-6 py-2.5 bg-[#FEA515] text-white font-semibold text-sm rounded-full transition-all duration-300 hover:bg-[#EE9401] hover:shadow-lg hover:shadow-orange-500/25 active:scale-95">
                        Join KMID
                    </a>
                @endauth
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
            <a href="{{ route('home') }}" @class([
                'text-base font-semibold text-[#004ADA]' => request()->routeIs('home'),
                'text-base font-medium text-[#1F1F1F] hover:text-[#004ADA]' => !request()->routeIs('home'),
            ]) @if(request()->routeIs('home')) aria-current="page" @endif>Home</a>
            <a href="{{ route('about') }}" @class([
                'text-base font-semibold text-[#004ADA]' => request()->routeIs('about'),
                'text-base font-medium text-[#1F1F1F] hover:text-[#004ADA]' => !request()->routeIs('about'),
            ]) @if(request()->routeIs('about')) aria-current="page" @endif>About</a>
            <a href="{{ route('activities') }}" @class([
                'text-base font-semibold text-[#004ADA]' => request()->routeIs('activities'),
                'text-base font-medium text-[#1F1F1F] hover:text-[#004ADA]' => !request()->routeIs('activities'),
            ]) @if(request()->routeIs('activities')) aria-current="page" @endif>Activities</a>
            <a href="{{ route('impact') }}" @class([
                'text-base font-semibold text-[#004ADA]' => request()->routeIs('impact'),
                'text-base font-medium text-[#1F1F1F] hover:text-[#004ADA]' => !request()->routeIs('impact'),
            ]) @if(request()->routeIs('impact')) aria-current="page" @endif>Impact</a>
            <a href="{{ route('information') }}" @class([
                'text-base font-semibold text-[#004ADA]' => request()->routeIs('information'),
                'text-base font-medium text-[#1F1F1F] hover:text-[#004ADA]' => !request()->routeIs('information'),
            ]) @if(request()->routeIs('information')) aria-current="page" @endif>Information</a>
            <div class="pt-2 border-t border-slate-100">
                @auth
                    @if(auth()->user()->role === 'admin')
                        <div class="flex flex-col gap-2">
                            <a href="{{ route('admin.pendaftar.index') }}" class="block w-full text-center px-5 py-2.5 bg-[#004ADA] text-white font-semibold text-sm rounded-full shadow-md">
                                Dashboard Admin
                            </a>
                            <a href="{{ route('open-recruitment') }}" class="block w-full text-center px-5 py-2 border border-[#004ADA] text-[#004ADA] font-semibold text-sm rounded-full hover:bg-blue-50">
                                Portal Oprec (Pendaftar)
                            </a>
                        </div>
                    @elseif(auth()->user()->role === 'staff')
                        <div class="flex flex-col gap-2">
                            <a href="{{ route('staff.pendaftar.index') }}" class="block w-full text-center px-5 py-2.5 bg-[#FEA515] text-white font-semibold text-sm rounded-full shadow-md">
                                Dashboard Staff
                            </a>
                            <a href="{{ route('open-recruitment') }}" class="block w-full text-center px-5 py-2 border border-[#FEA515] text-[#FEA515] font-semibold text-sm rounded-full hover:bg-amber-50">
                                Portal Oprec (Pendaftar)
                            </a>
                        </div>
                    @else
                        <a href="{{ route('open-recruitment') }}" class="block w-full text-center px-5 py-3 bg-[#FEA515] text-white font-semibold text-sm rounded-full shadow-md">
                            Dashboard Oprec
                        </a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="block w-full text-center px-5 py-3 bg-[#FEA515] text-white font-semibold text-sm rounded-full shadow-md">
                        Join KMID
                    </a>
                @endauth
            </div>
        </div>
    </header>
@endif
