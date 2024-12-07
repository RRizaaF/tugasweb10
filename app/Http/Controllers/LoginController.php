<?php
namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller {
    public function login(Request $request) {
        // Validasi input
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek kredensial
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Login berhasil, set session atau gunakan Auth::login
            Auth::login($user);

            // Redirect ke dashboard
            return redirect()->route('articles.index');
        }

        // Jika gagal, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'loginError' => 'Email atau password salah.',
        ])->withInput();
    }

    public function showLoginForm() {
        return view('login');
    }
}