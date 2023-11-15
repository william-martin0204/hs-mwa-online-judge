<?php

use App\Http\Controllers\AdminProblemController;
use App\Http\Controllers\AdminTagController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\ProblemController;
use App\Http\Controllers\ProfileController;
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
Route::get('problems/{problem:slug}', [ProblemController::class, 'show'])->name('problems.show');

Route::get('submissions', [SubmissionController::class, 'index'])->name('submissions.index');
Route::get('submissions/{id}', [SubmissionController::class, 'show'])->name('submissions.show');

Route::get('tags', [TagController::class, 'index'])->name('tags.index');
Route::get('tags/{tag:slug}', [TagController::class, 'show'])->name('tags.show');


// ------------ Authentication required ---------------------------- //

// Admin routes
Route::name('admin.')->middleware(['auth', 'is.admin'])->group(function () {
    Route::resource('admin/problems', AdminProblemController::class)->parameters(['problems' => 'problem:slug']);
    Route::resource('admin/tags', AdminTagController::class)->parameters(['tags' => 'tag:slug']);
});

Route::post('submissions', [SubmissionController::class, 'store'])
    ->middleware('auth')
    ->name('submissions.store');

Route::get('/dashboard', function () {
    return redirect()->route('welcome.index');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
