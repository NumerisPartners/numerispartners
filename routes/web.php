<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

// Page des services
Route::get('/services', [ServiceController::class, 'index'])->name('services');

// Page à propos
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Page de contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Pages légales
Route::prefix('legal')->name('legal.')->group(function () {
    Route::view('/mentions-legales', 'pages.legal.mentions-legales')->name('mentions-legales');
    Route::view('/politique-confidentialite', 'pages.legal.politique-confidentialite')->name('politique-confidentialite');
    Route::view('/plan-du-site', 'pages.legal.plan-du-site')->name('plan-du-site');
});

// Routes d'authentification
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Gestion des messages de contact (protégée par authentification)
    Route::get('/messages', [ContactController::class, 'messages'])->name('contact.messages');
    Route::get('/messages/{contact}', [ContactController::class, 'show'])->name('contact.show');
    Route::post('/messages/{contact}/mark-as-replied', [ContactController::class, 'markAsReplied'])->name('contact.mark-as-replied');
    
    // Routes d'administration
    Route::prefix('admin')->name('admin.')->group(function () {
        // Gestion des utilisateurs
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });
});

require __DIR__.'/auth.php';
