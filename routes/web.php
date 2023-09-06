<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome')->name('home');

Route::prefix('login')->as('login:')->middleware('guest')->group(
    base_path('routes/web/login.php'),
);
Route::prefix('logout')->as('logout:')->middleware('auth')->group(
    base_path('routes/web/logout.php'),
);

Route::prefix('teams')->as('teams:')->group(
    base_path('routes/web/teams.php'),
);

Route::prefix('plans')->as('plans:')->group(
    base_path('routes/web/plans.php'),
);

Route::prefix('rankings')->as('rankings:')->group(
    base_path('routes/web/rankings.php'),
);

Route::prefix('profil')->as('profil:')->middleware('auth')->group(
    base_path('routes/web/profil.php'),
);
