<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\BlogCategoryController;

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

// Page blog
Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/category/{category:slug}', [BlogController::class, 'category'])->name('category');
    Route::get('/{blog:slug}', [BlogController::class, 'show'])->name('show');
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
    Route::middleware(['verified'])->prefix('admin')->name('admin.')->group(function () {
        // Gestion des utilisateurs
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        
        // Blog routes
        Route::prefix('blog')->name('blog.')->group(function () {
            Route::get('/', [AdminBlogController::class, 'index'])->name('index');
            Route::get('/create', [AdminBlogController::class, 'create'])->name('create');
            Route::post('/', [AdminBlogController::class, 'store'])->name('store');
            Route::get('/{blog}/edit', [AdminBlogController::class, 'edit'])->name('edit');
            Route::put('/{blog}', [AdminBlogController::class, 'update'])->name('update');
            Route::delete('/{blog}', [AdminBlogController::class, 'destroy'])->name('destroy');
            
            // Blog categories routes
            Route::prefix('categories')->name('categories.')->group(function () {
                Route::get('/', [BlogCategoryController::class, 'index'])->name('index');
                Route::get('/create', [BlogCategoryController::class, 'create'])->name('create');
                Route::post('/', [BlogCategoryController::class, 'store'])->name('store');
                Route::get('/{category}/edit', [BlogCategoryController::class, 'edit'])->name('edit');
                Route::put('/{category}', [BlogCategoryController::class, 'update'])->name('update');
                Route::delete('/{category}', [BlogCategoryController::class, 'destroy'])->name('destroy');
            });
        });
    });
});

require __DIR__.'/auth.php';
