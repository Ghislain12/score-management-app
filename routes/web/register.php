<?php

use App\Livewire\Register;
use Illuminate\Support\Facades\Route;

Route::get('/', Register::class)->name('index');
