<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TrashController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::resource('teacher', TeacherController::class);

Route::get('trash', [TrashController::class, 'index'])->name('trash.index');
Route::get('trash/restore/{id}', [TrashController::class, 'restore'])->name('trash.restore');
Route::get('trash/permanently/{id}', [TrashController::class, 'delete_permanently'])->name('trash.permanently');
