<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\MapsController;
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

Route::get('artikel', [PostsController::class, 'show'])->name('artikel');
Route::get('artikel/category/{category}', [PostsController::class, 'category'])->name('artikel.category');
Route::get('artikel/{post:slug}', [PostsController::class, 'single'])->name('artikel.single');

Route::get('sebaran-gunung', [MapsController::class, 'show'])->name('sebaran-gunung');
Route::get('sebaran-gunung/{map}', [MapsController::class, 'single'])->name('sebaran-gunung');

Route::get('tentang-kami', [AboutUsController::class, 'show'])->name('tentang-kami');
Route::get('struktur', [AboutUsController::class, 'struktur'])->name('struktur');

Route::get('contact-us', [AboutUsController::class, 'contactUs'])->name('contact-us');
Route::post('send-email', [AboutUsController::class, 'sendEmail'])->name('send-email');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('post', [PostsController::class, 'index'])->name('post');
    Route::get('post/create', [PostsController::class, 'create'])->name('post.create');
    Route::post('post', [PostsController::class, 'store'])->name('post.store');
    Route::get('post/{post:slug}/edit', [PostsController::class, 'edit'])->name('post.edit');
    Route::patch('post/{post:slug}', [PostsController::class, 'update'])->name('post.update');
    Route::delete('post/{post:slug}', [PostsController::class, 'destroy'])->name('post.delete');
    Route::get('post/createSlug', [PostsController::class, 'createSlug'])->name('post.createSlug');

    Route::get('anggota', [MembersController::class, 'show'])->name('anggota');
    Route::get('anggota/{member}', [MembersController::class, 'edit'])->name('anggota.edit');
    Route::delete('anggota/{member}', [MembersController::class, 'destroy'])->name('anggota.delete');

    Route::post('upload/image', [ImageUploadController::class, 'imageUploadPost'])->name('upload.image');

    Route::post('category', [CategoriesController::class, 'store'])->name('category.store');

    Route::get('data-maps', [MapsController::class, 'index'])->name('data-maps');
    Route::get('data-maps/create', [MapsController::class, 'create'])->name('data-maps.create');
    Route::get('data-maps/{id}/edit', [MapsController::class, 'edit'])->name('data-maps.edit');
    Route::post('data-maps/store', [MapsController::class, 'store'])->name('data-maps.store');
    Route::patch('data-maps/{map:id}', [MapsController::class, 'update'])->name('data-maps.update');
    Route::delete('data-maps/{map:id}', [MapsController::class, 'destroy'])->name('data-maps.delete');

    Route::get('struktur-organisasi', [AboutUsController::class, 'index'])->name('struktur-organisasi');
    Route::get('struktur-organisasi/create', [AboutUsController::class, 'create'])->name('struktur-organisasi.create');
    Route::post('struktur-organisasi/store', [AboutUsController::class, 'store'])->name('struktur-organisasi.store');
    Route::get('struktur-organisasi/{aboutUs}/edit', [AboutUsController::class, 'edit'])->name('struktur-organisasi.edit');
    Route::post('struktur-organisasi/{aboutUs}', [AboutUsController::class, 'update'])->name('struktur-organisasi.update');
    Route::get('struktur-organisasi/{id}', [AboutUsController::class, 'getData'])->name('struktur-organisasi.periode');
});
