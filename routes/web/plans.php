<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('plans.index'))->name('index');