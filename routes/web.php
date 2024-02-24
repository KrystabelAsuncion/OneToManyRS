<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\control;
use App\Http\Controllers\Web\DataController;

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

Route::get('/', [DataController::class, 'index'])->name('dashboard');
Route::get('/students/create', [DataController::class, 'createStudent'])->name('students.create');
Route::post('/students/store', [DataController::class, 'storeStudent'])->name('students.store');
Route::get('/students/{id}/edit', [DataController::class, 'editStudent'])->name('students.edit');
Route::put('/students/{id}/update', [DataController::class, 'updateStudent'])->name('students.update');
Route::get('/students/{id}/delete', [DataController::class, 'destroyStudent'])->name('students.destroy');

Route::get('/subjects/create', [DataController::class, 'createSubject'])->name('subjects.create');
Route::post('/subjects/store', [DataController::class, 'storeSubject'])->name('subjects.store');
Route::get('/subjects/{id}/edit', [DataController::class, 'editSubject'])->name('subjects.edit');
Route::put('/subjects/{id}/update', [DataController::class, 'updateSubject'])->name('subjects.update');
Route::get('/subjects/{id}/delete', [DataController::class, 'destroySubject'])->name('subjects.destroy');

