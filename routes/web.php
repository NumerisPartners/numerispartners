<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;

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
});

require __DIR__.'/auth.php';
