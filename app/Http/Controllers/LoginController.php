<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        if (Auth::attempt($credential)) {
            $userRole = User::where('email', $credential['email'])->first();
            $request->session()->regenerate();

            switch ($userRole->is_admin) {
                    // admin
                case 1:
                    return redirect()->intended('/dashboard/verifikasi');
                    break;
                    // dokter
                case 2:
                    return redirect()->intended('/dashboard/listpasien');
                    break;
                    // administrasi
                case 3:
                    return redirect()->intended('/dashboard/pembayaran/list');
                    break;
                    // farmasi
                case 4:
                    return redirect()->intended('/dashboard/tambahobat');
                    break;
                default:
                    return redirect()->intended('/dashboard');
            }
        }

        return back()->with('gagal', 'Login Gagal');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/home');
    }
}
