<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('users.profile'))->name('index');
