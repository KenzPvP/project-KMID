<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Staff Dashboard | KMID</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 min-h-screen text-[#1F1F1F] font-sans p-6">
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-sm border border-slate-200 p-8">
        <div class="flex items-center justify-between border-b border-slate-100 pb-5 mb-6">
            <div>
                <span class="inline-block px-3 py-1 bg-blue-100 text-blue-700 font-semibold text-xs rounded-full uppercase tracking-wider mb-2">Role: Staff</span>
                <h1 class="text-2xl font-bold text-slate-800">Staff Dashboard</h1>
                <p class="text-sm text-slate-500">Panel kerja staf dan pengelola rekrutmen KMID.</p>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="px-4 py-2 bg-red-50 hover:bg-red-100 text-red-600 text-sm font-semibold rounded-xl transition-colors">
                    Keluar (Logout)
                </button>
            </form>
        </div>
        <div class="space-y-3 text-sm">
            <p><strong>Nama:</strong> {{ auth()->user()->name }}</p>
            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
            <p><strong>Role Aktif:</strong> {{ auth()->user()->role }}</p>
        </div>
    </div>
</body>
</html>
