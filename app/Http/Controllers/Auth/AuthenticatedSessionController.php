<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required'],
        ]);

        $user = \App\Models\Userx::where('username', $credentials['username'])->first();
        $passwordMatches = $user ? Hash::check($credentials['password'], $user->password) : false;
        $attempt = Auth::attempt($credentials);

        // Debug output before redirect
        dd([
            'input_credentials' => $credentials,
            'user_from_db' => $user ? $user->toArray() : null,
            'password_matches_manually' => $passwordMatches,
            'auth_attempt_result' => $attempt,
            'authenticated_user' => Auth::user(),
            'session_before' => $request->session()->all(),
            'guard_config' => config('auth.guards.web'),
            'provider_config' => config('auth.providers.usersx'),
        ]);

        if ($attempt) {
            $request->session()->regenerate();
            // Confirm redirect is reached
            dd('Redirecting to menu.index');
            return redirect()->route('menu.index');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}