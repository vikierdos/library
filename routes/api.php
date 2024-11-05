<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CopyController;
use App\Http\Controllers\LendingController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//bárki által elérhető
Route::post('/register',[RegisteredUserController::class, 'store']);
Route::post('/login',[AuthenticatedSessionController::class, 'store']);

Route::get('books-copies',[BookController::class, "booksCopies"]);
Route::get('specific-copy/{copy_id}',[CopyController::class, "specificCopy"]);


//autentikált útvonal
Route::middleware(['auth:sanctum'])
    ->group(function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
        Route::get('lendings-copies', [LendingController::class, "lendingsCopies"]);
        Route::get('user-lendings', [UserController::class, "userLendings"]);
        
        // Kijelentkezés útvonal
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);
    });

//admin
Route::middleware(['auth:sanctum',Admin::class])
->group(function () {

    Route::get('lendings-date', [LendingController::class, 'lendingsDate']);

    Route::get('/admin/users', [UserController::class, 'index']);
});



