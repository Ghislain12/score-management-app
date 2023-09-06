<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class Register extends Component
{
    public $email, $password, $confirmPassword, $name;

    public function register()
    {
        $this->validate(
            rules: [
                'name' => ['required', 'string'],
                'email' => ['required', 'email', 'unique:users,email'],
                'password' => ['required', Password::default()->min(8)->uncompromised()],
                'confirmPassword' => ['required', 'same:password']
            ],
            messages: [
                '*.required' => 'Veuillez renseigné ce champ',
                '*.email' => 'Veuillez entrer un email valide',
                '*.same' => 'Veuillez confirmer le mot de passe',
                '*.unique' => 'Cette adresse est déjà associé à un compte',
                '*.uncompromised' => 'Veuillez choisir un mot de passe moins facile'
            ]
        );

        $user = new User();

        DB::transaction(
            callback: fn (): bool => $user->forceFill(
                attributes: [
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => Hash::make($this->password),
                ]
            )->save(),
            attempts: 2
        );

        Auth::login(user: $user);

        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.register')->extends('layouts.auth');
    }
}
