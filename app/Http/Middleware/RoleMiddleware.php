<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  ...$roles
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();

        if (! $user) {
            return redirect()->route('login')->withErrors([
                'email' => 'Silakan masuk terlebih dahulu untuk mengakses halaman ini.',
            ]);
        }

        // Admin memiliki hak akses penuh ke semua halaman dan fitur sistem tanpa batasan
        if ($user && (method_exists($user, 'isAdmin') ? $user->isAdmin() : strtolower(trim($user->role ?? '')) === 'admin')) {
            return $next($request);
        }

        // Uraikan daftar role yang diperbolehkan (mendukung format 'admin,staff' atau beberapa argumen)
        $allowedRoles = [];
        foreach ($roles as $role) {
            foreach (explode(',', $role) as $r) {
                $trimmed = trim($r);
                if ($trimmed !== '') {
                    $allowedRoles[] = $trimmed;
                }
            }
        }

        if (! in_array($user->role, $allowedRoles, true)) {
            abort(403, 'Akses ditolak: Anda tidak memiliki izin untuk mengakses halaman ini.');
        }

        return $next($request);
    }
}
