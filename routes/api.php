<?php

use App\Http\Controllers\FirebaseExampleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('firebase')->group(function () {
    Route::get('contacts', [FirebaseExampleController::class, 'index'])->name('fb.contacts.index');
    Route::get('contacts/add', [FirebaseExampleController::class, 'create'])->name('fb.contacts.create');
    Route::post('contacts/add', [FirebaseExampleController::class, 'store'])->name('fb.contacts.store');
    Route::get('contacts/{id}', [FirebaseExampleController::class, 'show'])->name('fb.contacts.show');
    Route::put('contacts/{id}', [FirebaseExampleController::class, 'update'])->name('fb.contacts.update');
    Route::delete('contacts/{id}', [FirebaseExampleController::class, 'destroy'])->name('fb.contacts.destroy');
});
