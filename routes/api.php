<?php

use App\Http\Controllers\Api\ProblemController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\SubmissionController;
use App\Http\Controllers\Api\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/problems', [ProblemController::class, 'index']);
Route::get('/problems/{problem}', [ProblemController::class, 'show']);

Route::get('/submissions', [SubmissionController::class, 'index']);

Route::get('/tags', [TagController::class, 'index']);
Route::get('/tags/{tag}', [TagController::class, 'show']);

Route::get('/users', [ProfileController::class, 'index']);
Route::get('users/{user}', [ProfileController::class, 'show']);

Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('/problems', [ProblemController::class, 'store']);
    Route::put('/problems/{problem}', [ProblemController::class, 'update']);
    Route::delete('/problems/{problem}', [ProblemController::class, 'destroy']);

    Route::get('/submissions/{submission}', [SubmissionController::class, 'show']);
    Route::post('/submissions', [SubmissionController::class, 'store']);

    Route::post('/tags', [TagController::class, 'store']);
    Route::put('/tags/{tag}', [TagController::class, 'update']);
    Route::delete('/tags/{tag}', [TagController::class, 'destroy']);

    Route::put('/users', [ProfileController::class, 'update']);
    Route::delete('/users', [ProfileController::class, 'destroy']);
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
