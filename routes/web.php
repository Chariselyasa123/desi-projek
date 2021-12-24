<?php

use App\Http\Controllers\MembersController;
use App\Http\Controllers\PostsController;
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
        'canLogin'       => Route::has('login'),
        'canRegister'    => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion'     => PHP_VERSION,
    ]);
})->name('welcome');

Route::get('pendaftaran-anggota', [MembersController::class, 'index'])->name('pendaftaran-anggota');
Route::post('pendaftaran-anggota', [MembersController::class, 'store'])->name('pendaftaran-anggota.store');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('artikel', [PostsController::class, 'index'])->name('artikel');
    Route::post('artikel', [PostsController::class, 'store'])->name('artikel.store');
});
