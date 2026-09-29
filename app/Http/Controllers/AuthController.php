<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // intended() falls back to the landing page when the user did not
            // get interrupted by an auth gate. The fallback was a literal
            // '/welcome' URL, which no route has ever defined -- the landing
            // page is the root and 'welcome' is a route *name*. Every
            // successful web login therefore landed on a 404.
            //
            // route() instead of a string is the point: a missing name throws
            // instead of silently producing a dead URL, which is what let
            // the placeholder survive with a comment admitting it was
            // unfinished.
            return redirect()->intended(route('welcome'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showRegistrationForm(): View
    {
        return view('auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        // Validasi data input
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        // Membuat pengguna baru
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Login otomatis setelah registrasi
        Auth::login($user);

        // Redirect ke halaman welcome dengan pesan sukses
        return redirect()->route('welcome')->with('success', 'Registration successful! Welcome, '.$user->name);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have successfully logged out.');
    }
}
