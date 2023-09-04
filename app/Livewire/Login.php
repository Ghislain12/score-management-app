<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class Login extends Component
{
    public string $email;

    public string $password;

    public string $error;

    public function authenticate()
    {
        $this->validate([
            'email' => ['email', 'required'],
            'password' => ['string', Password::default()->min(6)]
        ]);

        $user = User::whereEmail($this->email);

        if ($user->exists() && Hash::check(value: $this->password, hashedValue: $user->first()->password)) {
            Auth::login(user: $user->first());
            return redirect()->intended('/');
        } else {
            $this->error = 'Impossible d\'identifier le compte associé à ce mail';
            return;
        }
    }

    public function render()
    {
        return view('livewire.login')->extends('layouts.auth');
    }
}
