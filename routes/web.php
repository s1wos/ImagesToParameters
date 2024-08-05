<?php

use App\Http\Controllers\ParameterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParameterImageController;

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
Route::resource('parameters', ParameterController::class);
Route::resource('parameters', ParameterController::class)->except(['create', 'store', 'show', 'destroy']);

Route::post('parameters/{parameter}/images', [ParameterImageController::class, 'store'])->name('parameters.images.store');
Route::delete('parameters/{parameter}/images/{imageType}', [ParameterImageController::class, 'destroy'])->name('parameters.images.destroy');
