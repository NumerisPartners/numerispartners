<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ClientProjectController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\Admin\TrainingController as AdminTrainingController;
use App\Http\Controllers\Admin\TrainingSessionController;
use App\Http\Controllers\TrainingRegistrationController;
use App\Http\Controllers\Admin\TrainingRegistrationController as AdminTrainingRegistrationController;
use App\Http\Middleware\CheckRole;

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

// Page de demande de projet
Route::get('/demarrer-projet', [ClientProjectController::class, 'create'])->name('projects.create');
Route::post('/demarrer-projet', [ClientProjectController::class, 'store'])->name('projects.store');

// Pages des formations
Route::prefix('formations')->name('trainings.')->group(function () {
    Route::get('/', [TrainingController::class, 'index'])->name('index');
    Route::get('/{training:slug}', [TrainingController::class, 'show'])->name('show');
    Route::get('/{training:slug}/session/{session}', [TrainingController::class, 'showSession'])->name('session');
    
    // Routes pour les inscriptions aux formations
    Route::get('/{training:slug}/session/{session}/inscription', [TrainingRegistrationController::class, 'create'])->name('register');
    Route::post('/{training:slug}/session/{session}/inscription', [TrainingRegistrationController::class, 'store'])->name('register.store');
});

// Routes pour la gestion des inscriptions par l'utilisateur
Route::middleware('auth')->prefix('mes-inscriptions')->name('my-registrations.')->group(function () {
    Route::get('/', [TrainingRegistrationController::class, 'myRegistrations'])->name('index');
    Route::post('/{registration}/cancel', [TrainingRegistrationController::class, 'cancel'])->name('cancel');
});

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
    
    // Routes accessibles uniquement aux administrateurs
    Route::middleware([CheckRole::class . ':admin'])->group(function () {
        // Gestion des messages de contact (protégée par authentification)
        Route::get('/messages', [ContactController::class, 'messages'])->name('contact.messages');
        Route::get('/messages/{contact}', [ContactController::class, 'show'])->name('contact.show');
        Route::post('/messages/{contact}/mark-as-replied', [ContactController::class, 'markAsReplied'])->name('contact.mark-as-replied');
       
        // Gestion des projets clients (protégée par authentification)
        Route::get('/projects', [ClientProjectController::class, 'index'])->name('projects.index');
        Route::get('/projects/{project}', [ClientProjectController::class, 'show'])->name('projects.show');
        Route::get('/projects/{project}/edit', [ClientProjectController::class, 'edit'])->name('projects.edit');
        Route::put('/projects/{project}', [ClientProjectController::class, 'update'])->name('projects.update');
        Route::delete('/projects/{project}', [ClientProjectController::class, 'destroy'])->name('projects.destroy');
        Route::post('/projects/{project}/change-status', [ClientProjectController::class, 'changeStatus'])->name('projects.change-status');
        

        // Routes d'administration
        Route::middleware(['verified'])->prefix('admin')->name('admin.')->group(function () {
            // Gestion des utilisateurs
            Route::get('/users', [UserController::class, 'index'])->name('users.index');
            Route::post('/users', [UserController::class, 'store'])->name('users.store');
            Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
            Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
            
            // Gestion des formations
            Route::post('/trainings/{training}/duplicate', [AdminTrainingController::class, 'duplicate'])->name('trainings.duplicate');
            Route::resource('trainings', AdminTrainingController::class);
            
            // Gestion des sessions de formation
            Route::prefix('trainings/{training}')->name('trainings.')->group(function () {
                Route::resource('sessions', TrainingSessionController::class);
                
                // Gestion des inscriptions aux sessions de formation
                Route::prefix('sessions/{session}')->name('sessions.')->group(function () {
                    Route::get('/registrations', [AdminTrainingRegistrationController::class, 'index'])->name('registrations.index');
                    Route::get('/registrations/{registration}', [AdminTrainingRegistrationController::class, 'show'])->name('registrations.show');
                    Route::post('/registrations/{registration}/confirm', [AdminTrainingRegistrationController::class, 'confirm'])->name('registrations.confirm');
                    Route::post('/registrations/{registration}/cancel', [AdminTrainingRegistrationController::class, 'cancel'])->name('registrations.cancel');
                    Route::delete('/registrations/{registration}', [AdminTrainingRegistrationController::class, 'destroy'])->name('registrations.destroy');
                    Route::post('/update-available-seats', [AdminTrainingRegistrationController::class, 'updateAvailableSeats'])->name('registrations.update-seats');
                });
            });
        });
        
    });

    
    Route::middleware([CheckRole::class . ':editor|admin'])->group(function () {
        // Routes d'administration
        Route::middleware(['verified'])->prefix('admin')->name('admin.')->group(function () {
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

     // Routes accessibles uniquement aux administrateurs
    });



});

require __DIR__.'/auth.php';
