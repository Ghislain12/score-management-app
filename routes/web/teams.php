<?php

use App\Models\Team;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('teams.index'))->name('index');
Route::get('/{team}', fn (Team $team) => view('teams.show', ['id' => $team->id]))->missing(fn () => redirect()->route('teams:index'))->name('show');
