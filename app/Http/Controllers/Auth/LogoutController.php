<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

final class LogoutController
{
    public function __invoke(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login:login');
    }
}
