<?php

namespace App\Services\Security;

use App\Models\User;
use Illuminate\Http\Request;

class AccountLockValidator implements HandlerInterface
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

        if ($user && $user->is_locked) {
            return 'Akun Anda terkunci. Silakan hubungi administrator.';
        }

        // Jika ada handler berikutnya, teruskan permintaan
        if ($this->nextHandler) {
            return $this->nextHandler->handle($request);
        }

        return null; // Tidak ada masalah
    }
}
