<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('rankings.index'))->name('index');
