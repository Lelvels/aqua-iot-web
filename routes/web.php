<?php

use App\Http\Controllers\ApiDocumentController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SensorDataController;
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

//Home
Route::get('/', [HomeController::class, 'home'])->name('home.index');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');

//Device
Route::resource('devices', DeviceController::class)->middleware(['auth']);

//SensorData
Route::resource('sensordatas', SensorDataController::class)
->only(['index', 'show', 'destroy'])->middleware(['auth']);

//API documents
Route::get('/apidoc', [ApiDocumentController::class, "index"])
->middleware(['auth'])->name('apidoc.index');

require __DIR__.'/auth.php';
