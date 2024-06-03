<?php

use App\Http\Controllers\Admin\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('student', StudentController::class);
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
