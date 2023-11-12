<?php

use App\Http\Controllers\AdminTagController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\ProblemController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome.index');

Route::get('leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard.index');

Route::get('problems', [ProblemController::class, 'index'])->name('problems.index');
Route::get('problems/{id}', [ProblemController::class, 'show'])->name('problems.show');

Route::get('submissions', [SubmissionController::class, 'index'])->name('submissions.index');
Route::get('submissions/{id}', [SubmissionController::class, 'show'])->name('submissions.show');

Route::get('tags', [TagController::class, 'index'])->name('tags.index');
Route::get('tags/{id}', [TagController::class, 'show'])->name('tags.show');

// Authentication required
Route::name('admin.')->group(function () {
    Route::resource('admin/tags', AdminTagController::class);
});
