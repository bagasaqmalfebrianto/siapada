<?php

namespace App\Services\Security;

use App\Models\User;
use Illuminate\Http\Request;

class LoginAttemptLimitHandler implements HandlerInterface
{
    private $nextHandler;

    public function setNext(HandlerInterface $handler): HandlerInterface
    {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle(Request $request) // Pastikan parameter adalah Request
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Increment login attempts jika login gagal
            $user->increment('login_attempts');

            // Cek jika sudah melebihi batas percobaan login
            if ($user->login_attempts >= 5) {
                $user->is_locked = true; // Kunci akun
                $user->save();
                return 'Akun Anda telah terkunci karena terlalu banyak percobaan login.';
            }
        }

        // Jika ada handler berikutnya, teruskan permintaan
        if ($this->nextHandler) {
            return $this->nextHandler->handle($request);
        }

        return null; // Tidak ada masalah
    }
}
