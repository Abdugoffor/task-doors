<?php

use App\Http\Controllers\AccessoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\DoorController;
use App\Http\Controllers\HeandelController;
use App\Http\Controllers\HeightController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\WidthController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DoorController::class, 'index'])->name('door');
Route::post('/doors', [DoorController::class, 'store'])->name('door.store');
Route::put('/door/{id}', [DoorController::class, 'edit'])->name('door.edit');
Route::delete('/door/{id}', [DoorController::class, 'delete'])->name('door.delete');

Route::get('/color', [ColorController::class, 'index'])->name('color');
Route::post('/color', [ColorController::class, 'store'])->name('color.store');
Route::put('/color/{id}', [ColorController::class, 'edit'])->name('color.edit');
Route::delete('/color/{id}', [ColorController::class, 'delete'])->name('color.delete');

Route::get('/heandl', [HeandelController::class, 'index'])->name('heandl');
Route::post('/heandl', [HeandelController::class, 'store'])->name('heandl.store');
Route::put('/heandl/{id}', [HeandelController::class, 'edit'])->name('heandl.edit');
Route::delete('/heandl/{id}', [HeandelController::class, 'delete'])->name('heandl.delete');

Route::get('/material', [MaterialController::class, 'index'])->name('material');
Route::post('/material', [MaterialController::class, 'store'])->name('material.store');
Route::put('/material/{id}', [MaterialController::class, 'edit'])->name('material.edit');
Route::delete('/material/{id}', [MaterialController::class, 'delete'])->name('material.delete');

Route::get('/accessory', [AccessoryController::class, 'index'])->name('accessory');
Route::post('/accessory', [AccessoryController::class, 'store'])->name('accessory.store');
Route::put('/accessory/{id}', [AccessoryController::class, 'edit'])->name('accessory.edit');
Route::delete('/accessory/{id}', [AccessoryController::class, 'delete'])->name('accessory.delete');

Route::get('/height', [HeightController::class, 'index'])->name('height');
Route::post('/height', [HeightController::class, 'store'])->name('height.store');
Route::put('/height/{id}', [HeightController::class, 'edit'])->name('height.edit');
Route::delete('/height/{id}', [HeightController::class, 'delete'])->name('height.delete');

Route::get('/width', [WidthController::class, 'index'])->name('width');
Route::post('/width', [WidthController::class, 'store'])->name('width.store');
Route::put('/width/{id}', [WidthController::class, 'edit'])->name('width.edit');
Route::delete('/width/{id}', [WidthController::class, 'delete'])->name('width.delete');
