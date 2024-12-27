<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;



Route::get('/home',[TaskController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function(){
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create'); // Show form to create a task
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store'); // Save new task
    Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit'); // Show form to edit a task
    Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update'); // Update task
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy'); // Delete task

});


require __DIR__.'/auth.php';
