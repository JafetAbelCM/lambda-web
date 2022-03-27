<?php

use App\Http\Controllers\CurrentStudentController;
use App\Http\Controllers\Inertia\StudentController;
use App\Http\Controllers\Inertia\UniversityController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('students.index');
    });

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Students
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students/create', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/{key}', [StudentController::class, 'show'])->name('students.show');
    Route::put('/students/{key}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/students/{key}', [StudentController::class, 'destroy'])->name('students.destroy');

    // Student Dashboard
    Route::get('/me', [CurrentStudentController::class, 'index'])->name('me.index');
    Route::get('/me/ranking', [CurrentStudentController::class, 'index'])->name('me.ranking');
    Route::get('/me/attendance', [CurrentStudentController::class, 'index'])->name('me.attendance');

    // Universities
    Route::get('/universities', [UniversityController::class, 'index'])->name('universities.index');
    Route::get('/universities/create', [UniversityController::class, 'create'])->name('universities.create');
    Route::post('/universities/create', [UniversityController::class, 'store'])->name('universities.store');
    Route::get('/universities/{key}', [UniversityController::class, 'show'])->name('universities.show');
    Route::put('/universities/{key}', [UniversityController::class, 'update'])->name('universities.update');
    Route::delete('/universities/{key}', [UniversityController::class, 'destroy'])->name('universities.destroy');

});
