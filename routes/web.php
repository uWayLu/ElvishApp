<?php

use App\Http\Controllers\NotifyBotController;
use App\Http\Controllers\UserDiscordSettingsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/notifybot', [NotifyBotController::class, 'show'])
    ->name('notifybot');

Route::get('/schedule-messages', [NotifyBotController::class, 'list'])
    ->name('schedule-messages-list');

Route::prefix('schedule-message')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/create', [NotifyBotController::class, 'create']);
});


Route::get('/discordbot', [UserDiscordSettingsController::class, 'show'])
    ->name('discordbot');

require __DIR__ . '/auth.php';
