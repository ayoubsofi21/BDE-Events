<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Models\Event;

Route::get('/', function () {
    $events=Event::all();
    return view('welcome',compact('events'));
});


Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store'])->name('register');

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');



Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('layouts.app');
        })->name('admin.dashboard');
    Route::get('/events/index',[EventController::class,'index'])->name('admin.events.index');
    Route::get('/events/create',[EventController::class,'create'])->name('admin.events.create');
    Route::post('/events/store',[EventController::class,'store'])->name('admin.events.store');
    Route::delete('/events/destroy/{id}',[EventController::class,'destroy'])->name('admin.events.destroy');
    Route::get('/events/edit/{event}',[EventController::class,'edit'])->name('admin.events.edit');
    Route::put('/events/update/{event}',[EventController::class,'update'])->name('admin.events.update');
    Route::get('/events/{event}',[EventController::class,'show'])->name('events.show');


   
    

});
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/dashboard', function () {
        return view('student.dashboard');
    })->name('student.dashboard');

    Route::post('/registrations', [RegistrationController::class, 'store'])->name('registrations.store');
    Route::get('/mes-billets', [RegistrationController::class, 'index'])->name('tickets.index');
    
    });

    // Route::get('/reserver',[EventController::class,'show'])->name('events.show');


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});
