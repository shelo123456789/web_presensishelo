<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
      /**
     * Menangani permintaan masuk.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Periksa apakah pengguna terautentikasi dan memiliki peran yang diperlukan
        if (!Auth::check() || Auth::user()->role !== $role) {
            // Redirect atau kembalikan respons error jika peran tidak sesuai
            return redirect('/'); // Redirect ke halaman utama atau halaman yang sesuai
        }

        return $next($request); // Melanjutkan permintaan jika peran sesuai
    }
}
