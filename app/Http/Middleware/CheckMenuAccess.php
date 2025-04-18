<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RoleMenu;

class CheckMenuAccess
{
    public function handle(Request $request, Closure $next)
    {
        // Ambil role_id dari pengguna yang sedang login
        $roleId = Auth::user()->role_id;

        // Ambil menu_id yang diakses berdasarkan URL
        $currentUrl = $request->path();
        $menu = \App\Models\Menu::where('url', $currentUrl)->first();
        // Jika tidak ada menu yang cocok, redirect ke halaman 404
        if (!$menu) {
            return redirect()->route('404');
        }

        // Cek apakah role ini memiliki akses ke menu tersebut
        $hasAccess = RoleMenu::where('role_id', $roleId)
            ->where('menu_id', $menu->id)
            ->exists();

        if (!$hasAccess) {
            // Jika tidak ada akses, arahkan pengguna ke halaman yang sesuai (misalnya dashboard)
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
