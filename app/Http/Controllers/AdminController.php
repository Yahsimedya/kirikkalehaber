<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function Logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Çıkış Yapıldı');
    }
    // public function Login()
    // {
    //     Auth::login();
    //     return Redirect()->route('admin.index')->with('success' ,'Giriş Yapıldı');

    // }
}
