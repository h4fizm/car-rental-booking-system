<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::user();

        // Redirect berdasarkan role
        if ($user->hasRole('admin')) {
            return redirect()->intended('/admin/dashboard');
        } elseif ($user->hasRole('operator')) {
            return redirect()->intended('/operator/dashboard');
        } elseif ($user->hasRole('user')) {
            return redirect()->intended('/user/dashboard');
        }

        return redirect()->intended('/dashboard'); // fallback jika tidak ada role
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Hapus data mobil dari session
        $request->session()->forget(['popularCars', 'favoriteCars', 'mobilFavorit', 'mobilPopuler']);

        // Logout dari guard 'web'
        Auth::guard('web')->logout();

        // Menonaktifkan sesi
        $request->session()->invalidate();

        // Menyegarkan token sesi untuk keamanan
        $request->session()->regenerateToken();

        // Redirect ke halaman utama
        return redirect('/');
    }

}
