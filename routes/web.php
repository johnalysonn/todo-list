<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index'])->name('index');
Route::get('/list_task_completed', [TaskController::class, 'list_task_completed'])->name('list_task_completed');
Route::get('/create', [TaskController::class, 'create'])->name('create');
Route::post('/store', [TaskController::class, 'store'])->name('store');
Route::delete('/destroy/{task}', [TaskController::class, 'destroy'])->name('destroy');
Route::get('/edit/{task}', [TaskController::class, 'edit'])->name('edit');
Route::put('/update/{task}', [TaskController::class, 'update'])->name('update');

// Check task

Route::get('/check/{task}', [TaskController::class, 'check'])->name('check');

