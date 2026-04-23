<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\StronaController;
use App\Http\Controllers\ZapisNaKursController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('kursy')->name('kursy.')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('index');
    Route::get('/{slug}', [CourseController::class, 'show'])->name('show');
});

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('show');
});

Route::get('/kontakt', [ContactController::class, 'index'])->name('kontakt.index');
Route::post('/kontakt', [ContactController::class, 'store'])->name('kontakt.store');

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

Route::get('/strona/{slug}', [StronaController::class, 'show'])->name('strony.show');

Route::post('/newsletter/zapis', [NewsletterController::class, 'store'])->name('newsletter.store');

Route::middleware('guest')->group(function () {
    Route::get('/rejestracja', [RegisterController::class, 'create'])->name('register');
    Route::post('/rejestracja', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/logowanie', [LoginController::class, 'create'])->name('login');
    Route::post('/logowanie', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/panel', [PanelController::class, 'index'])->name('panel.index');
    Route::post('/wyloguj', [LoginController::class, 'destroy'])->name('logout');

    Route::post('/kursy/{slug}/zapisz-sie', [ZapisNaKursController::class, 'store'])->name('kursy.zapisz');
});