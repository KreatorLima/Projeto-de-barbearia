<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SchedulingController;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', [DashboardController::class, 'redirect'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard'); // Rota mudada para ir para a dashboard do user/superadmin/admin

Route::middleware(['auth', 'last.activity'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard do Cliente
    Route::middleware(['role:client'])->group(function () {
        Route::get('/client/dashboard', [DashboardController::class, 'clientIndex'])->name('client.dashboard');
    });

    // Dashboard do Gerente
    Route::middleware(['role:manager'])->group(function () {
        Route::get('/manager/dashboard', [DashboardController::class, 'managerIndex'])->name('manager.dashboard');
    });

    // Dashboard do Admin
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', [DashboardController::class, 'adminIndex'])->name('admin.dashboard');
    });
});

Route::get('/agendamento', [SchedulingController::class, 'index'])->name('scheduling.index');
Route::post('/agendamento', [SchedulingController::class, 'store'])->name('agendamentos.store');

Route::post('/agendamentos/{id}/status', [SchedulingController::class, 'updateStatus'])
    ->name('scheduling.updateStatus');
    
require __DIR__.'/auth.php';
