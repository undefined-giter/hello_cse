<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function verifyLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('profiles.list'))->with('success', 'Vous êtes connecté');
        }
        

        return back()->with('error', 'Les informations d\'identification fournies ne correspondent pas à nos administrateurs enregistrés');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('homepage')->with('success', 'Vous êtes déconnecté');
    }
}

