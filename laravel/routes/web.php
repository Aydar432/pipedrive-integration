<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PipedriveController;
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

Route::get('/piperdrive-form', function () {
    return view('piperdrive');
});

Route::post('/send-to-pipedrive', [PipedriveController::class, 'send'])->name('piperdrive.send');
Route::get('/iframe', function () {
    return view('iframe-container');
});

