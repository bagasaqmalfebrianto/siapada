<?php

namespace App\Services\Security;

use Illuminate\Http\Request;

interface HandlerInterface
{
    public function setNext(HandlerInterface $handler): HandlerInterface;
    public function handle(Request $request); // Pastikan Request ada di sini
}
