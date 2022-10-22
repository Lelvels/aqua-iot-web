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
Route::get('/', [HomeController::class, "index"]
)->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get("/about", [HomeController::class, "about"]
)->name('about');

//Device
Route::get('/devices', [DeviceController::class, "index"])
->middleware(['auth'])->name("devices");

//SensorData
Route::get('/sensordatas', [SensorDataController::class, "index"])
->middleware(['auth'])->name("sensordatas");

//API documents
Route::get('/apidoc', [ApiDocumentController::class, "index"])
->middleware(['auth'])->name('apidoc');

require __DIR__.'/auth.php';
