<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('users')->controller(UserController::class)->group(function () {
    Route::get('', 'index');
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('students')->controller(StudentController::class)->group(function () {
    Route::get('','index');
    Route::get('/{id}','show');
    Route::post('','store');
    Route::put('/{id}','update');
    Route::delete('/{id}','destroy');
});






