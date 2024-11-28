<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return Inertia::render('Home');
    // })->name('dashboard');
       Route::get('/dashboard',
                 [UserController::class, 
                 'redireccionarDashboard'])->name('dashboard');

});




// Route::middleware('auth')->group(function () {
//     Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
// });
