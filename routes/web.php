<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Student\StudentDashboardController;
use App\Models\Event;
use Illuminate\Support\Facades\Route;

// Page d'accueil public
Route::get('/', function () {
    $events = Event::with('reservations')->latest()->get();
    return view('welcome', compact('events'));
})->name('home');

// Authentification (Invités)
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

// Déconnexion (Utilisateurs connectés)
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Espace Admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('events', EventController::class);

    // Route::get('/events/index',[EventController::class,'index'])->name('admin.events.index');
    // Route::get('/events/create',[EventController::class,'create'])->name('admin.events.create');
    // Route::post('/events/store',[EventController::class,'store'])->name('admin.events.store');
    // Route::delete('/events/destroy/{id}',[EventController::class,'destroy'])->name('admin.events.destroy');
    // Route::get('/events/edit/{event}',[EventController::class,'edit'])->name('admin.events.edit');
    // Route::put('/events/update/{event}',[EventController::class,'update'])->name('admin.events.update');
    // Route::get('/events/{event}',[EventController::class,'show'])->name('events.show');

});

// Espace Étudiant / Réservations
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard');
    Route::get('/events/{event}', [ReservationController::class, 'show'])->name('events.show');
    Route::get('/events/{event}/checkout', [ReservationController::class, 'checkout'])->name('reservations.checkout');
    Route::post('/events/{event}/confirm-payment', [ReservationController::class, 'confirmPayment'])->name('reservations.confirm');

    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/my-tickets', [ProfileController::class, 'myTickets'])->name('tickets.index');
});