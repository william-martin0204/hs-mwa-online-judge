<?php

use App\Http\Controllers\Api\ProblemController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/problems', [ProblemController::class, 'index']);
Route::get('/problems/{problem}', [ProblemController::class, 'show']);


Route::get('/tags', [TagController::class, 'index']);
Route::get('/tags/{tag}', [TagController::class, 'show']);

Route::get('/users', [ProfileController::class, 'index']);
Route::get('users/{user}', [ProfileController::class, 'show']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
