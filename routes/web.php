<?php

use App\Http\Controllers\ColorController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/color', [ColorController::class, 'index'])->name('color');
Route::post('/color', [ColorController::class, 'store'])->name('color.store');
Route::put('/color/{id}', [ColorController::class, 'edit'])->name('color.edit');
Route::delete('/color/{id}', [ColorController::class, 'delete'])->name('color.delete');
