<?php

use App\Http\Controllers\Problem;
use App\Http\Controllers\Welcome;
use App\Http\Controllers\Submission;
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

Route::get('/', [Welcome::class, 'welcome'])->name('welcome.index');

Route::get('problems', [Problem::class, 'index'])->name('problems.index');

Route::get('submissions', [Submission::class, 'index'])->name('submissions.index');
