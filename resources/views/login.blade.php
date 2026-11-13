<!DOCTYPE html>
<html lang="id" class="scroll-smooth overflow-x-hidden">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | KMID - Komunitas Mahasiswa Inovasi Digital</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased text-[#1F1F1F] bg-white selection:bg-[#004ADA] selection:text-white font-['Plus_Jakarta_Sans',sans-serif] overflow-x-hidden w-full">

    <!-- Fullscreen Auth Screen Container -->
    <div class="min-h-screen flex flex-col justify-between relative overflow-hidden bg-white w-full">
        
        <!-- Single Auth Background from Figma (Background_auth.png) -->
        <div class="absolute inset-0 pointer-events-none overflow-hidden select-none z-0" aria-hidden="true">
            <img src="{{ asset('images/desainKMID/Hi-fi-design/Background_auth.png') }}" alt="" class="w-full h-full object-cover object-top">
        </div>

        <!-- SITE HEADER / NAVBAR (Uses layout navbar) -->
        @include('layouts.navbar')

        <!-- MAIN CONTENT (Centered Vertically and Horizontally) -->
        <main class="flex-1 flex items-center justify-center relative z-10 px-4 sm:px-10 lg:px-16 py-6 sm:py-10 w-full overflow-hidden">
            <div class="max-w-[1240px] w-full mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-14 items-center">
                
                <!-- Left Headline Column -->
                <div class="lg:col-span-6 flex flex-col justify-center">
                    <!-- Status Tag -->
                    <div class="inline-flex items-center gap-2.5 mb-4 sm:mb-6">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#FEA515]"></span>
                        <span class="text-xs sm:text-sm font-bold tracking-wider text-[#004ADA] uppercase">LOGIN KMID</span>
                    </div>

                    <!-- Headline -->
                    <h1 class="text-3xl sm:text-5xl lg:text-[56px] font-extrabold text-[#1F1F1F] tracking-tight leading-[1.12]">
                        Selamat datang<br>
                        di <span class="text-[#FEA515]">KMID</span><span class="text-[#FEA515]">.</span>
                    </h1>

                    <!-- Subtitle / Description -->
                    <p class="mt-4 sm:mt-6 text-sm sm:text-base font-medium text-[#004ADA] max-w-md leading-relaxed">
                        Masuk ke akunmu dan lanjutkan perjalanan inovasi digital bersama KMID.
                    </p>
                </div>

                <!-- Right Login Card Column -->
                <div class="lg:col-span-6 flex justify-center lg:justify-end">
                    <div class="bg-white rounded-[24px] sm:rounded-3xl p-6 sm:p-10 shadow-[0_20px_50px_rgba(0,0,0,0.06)] border border-slate-100 max-w-[460px] w-full mx-auto">
                        <h2 class="text-2xl sm:text-3xl font-bold text-[#1F1F1F] tracking-tight">Login</h2>
                        <p class="text-xs sm:text-sm text-[#707070] mt-1.5 mb-6 font-normal">Gunakan email dan kata sandi akun KMID kamu.</p>

                        @if (session('success'))
                            <div class="mb-5 p-3.5 bg-emerald-50 border border-emerald-200 rounded-xl flex items-center gap-2.5 text-emerald-800 text-xs sm:text-sm font-medium">
                                <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="mb-5 p-3.5 bg-red-50 border border-red-200 rounded-xl flex items-start gap-2.5 text-red-700 text-xs sm:text-sm font-medium">
                                <svg class="w-5 h-5 text-red-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <div class="space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('login') }}" method="POST" class="space-y-4">
                            @csrf
                            
                            <!-- Email Field -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-[#1F1F1F] mb-1.5">Email</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-[#9CA3AF]">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="nama@mail.ugm.ac.id" class="w-full pl-11 pr-4 py-3 bg-white border @error('email') border-red-500 focus:border-red-500 focus:ring-red-500/20 @else border-[#E2E8F0] focus:border-[#004ADA] focus:ring-blue-500/20 @enderror rounded-xl text-sm text-[#1F1F1F] placeholder-[#9CA3AF] focus:outline-none focus:ring-2 transition-all">
                                </div>
                                @error('email')
                                    <p class="text-xs text-red-600 mt-1.5 font-medium flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        <span>{{ $message }}</span>
                                    </p>
                                @enderror
                            </div>

                            <!-- Kata Sandi Field -->
                            <div>
                                <label for="password" class="block text-sm font-medium text-[#1F1F1F] mb-1.5">Kata Sandi</label>
                                <div class="relative">
                                    <input type="password" id="password" name="password" required placeholder="Masukkan kata sandi" class="w-full pl-4 pr-11 py-3 bg-white border border-[#E2E8F0] rounded-xl text-sm text-[#1F1F1F] placeholder-[#9CA3AF] focus:outline-none focus:border-[#004ADA] focus:ring-2 focus:ring-blue-500/20 transition-all">
                                    <button type="button" id="toggle-password" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-[#9CA3AF] hover:text-[#1F1F1F] transition-colors focus:outline-none" aria-label="Toggle password visibility">
                                        <svg id="eye-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Lupa Kata Sandi -->
                            <div class="flex justify-end pt-0.5">
                                <a href="#" class="text-xs sm:text-sm font-medium text-[#004ADA] hover:text-[#003FBA] hover:underline transition-colors">Lupa kata sandi?</a>
                            </div>

                            <!-- Submit Button Masuk -->
                            <button type="submit" class="w-full py-3.5 px-4 bg-[#FEA515] hover:bg-[#EE9401] active:scale-[0.99] text-white font-semibold text-sm sm:text-base rounded-xl transition-all duration-200 shadow-md shadow-orange-500/25 mt-2">
                                Masuk
                            </button>

                            <!-- Google Button -->
                            <button type="button" class="w-full py-3.5 px-4 bg-[#0C5EFF] hover:bg-[#004ADA] active:scale-[0.99] text-white font-semibold text-sm sm:text-base rounded-xl transition-all duration-200 flex items-center justify-center gap-3 shadow-md shadow-blue-500/20 mt-3">
                                <svg class="w-5 h-5 fill-white shrink-0" viewBox="0 0 24 24">
                                    <path d="M12.48 10.92v3.28h7.84c-.24 1.84-.853 3.187-1.787 4.133-1.147 1.147-2.933 2.4-6.053 2.4-4.827 0-8.6-3.893-8.6-8.72s3.773-8.72 8.6-8.72c2.6 0 4.507 1.027 5.907 2.347l2.307-2.307C18.747 1.44 16.133 0 12.48 0 5.867 0 .307 5.387.307 12s5.56 12 12.173 12c3.573 0 6.267-1.173 8.373-3.36 2.16-2.16 2.84-5.213 2.84-7.667 0-.76-.053-1.467-.173-2.053H12.48z"/>
                                </svg>
                                <span>Lanjutkan dengan Google</span>
                            </button>
                        </form>

                        <!-- Footer Switch to Register -->
                        <div class="mt-8 text-center text-xs sm:text-sm text-[#1F1F1F]">
                            Belum memiliki akun? <a href="{{ route('register') }}" class="font-semibold text-[#004ADA] hover:text-[#003FBA] hover:underline transition-colors">Daftar</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Subtle bottom spacer -->
        <div class="h-6 sm:h-10 pointer-events-none"></div>
    </div>

    <!-- SITE FOOTER (Uses layout footer) -->
    @include('layouts.footer')

    <!-- Interactive JS for Password Toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggleBtn = document.getElementById('toggle-password');
            const passInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            const emailInput = document.getElementById('email');

            function validateUgmEmail() {
                const val = (emailInput.value || '').trim();
                if (val && !val.toLowerCase().endsWith('@mail.ugm.ac.id')) {
                    emailInput.setCustomValidity('Gunakan email UGM dengan domain @mail.ugm.ac.id');
                } else {
                    emailInput.setCustomValidity('');
                }
            }

            if (emailInput) {
                emailInput.addEventListener('input', validateUgmEmail);
                emailInput.addEventListener('change', validateUgmEmail);
            }
            
            if (toggleBtn && passInput && eyeIcon) {
                toggleBtn.addEventListener('click', () => {
                    const isPassword = passInput.type === 'password';
                    passInput.type = isPassword ? 'text' : 'password';
                    if (isPassword) {
                        eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/>`;
                    } else {
                        eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>`;
                    }
                });
            }
        });
    </script>
</body>
</html>
