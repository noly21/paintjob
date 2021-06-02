<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaintController;

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

Route::get('/', [PaintController::class, 'index']);
Route::get('/paintjobs', [PaintController::class, 'paintjobs']);
Route::post('/add', [PaintController::class, 'insert'])->name('save.post');
Route::get('/update/{id}', [PaintController::class, 'update'])->name('update.post');
Route::post('/update_progress/{id}', [PaintController::class, 'update_onprogress'])->name('update.progress');
