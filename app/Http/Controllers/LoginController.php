<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Pastikan untuk mengimpor model User
use App\Services\Security\AccountLockValidator; // Import handler untuk akun terkunci
use App\Services\Security\LoginAttemptLimitHandler; // Import handler untuk batasan login

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Membangun chain of responsibility
        $lockHandler = new AccountLockValidator();
        $attemptHandler = new LoginAttemptLimitHandler();
        
        // Menyambungkan handler
        $lockHandler->setNext($attemptHandler);

        // Menjalankan handler
        $errorMessage = $lockHandler->handle($request);

        if ($errorMessage) {
            return back()->with('loginError', $errorMessage); // Kembali dengan pesan error
        }

        // Coba untuk login
        if (Auth::attempt($credentials)) {
            // Reset login attempts jika login berhasil
            $user = User::where('email', $request->email)->first();
            $user->login_attempts = 0; // Reset jumlah percobaan
            $user->is_locked = false;   // Pastikan akun tidak terkunci
            $user->save();

            $request->session()->regenerate();

            // Redirect sesuai peran pengguna
            if (auth()->user()->is_admin) {
                return redirect()->intended('/dashboard_admin2/data_user');
            }
            return redirect()->intended('/home');
        }

        return back()->with('loginError', 'Login Gagal');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/home');
    }
}
