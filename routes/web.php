<?php

use App\Http\Controllers\ModulController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/yonetim', function () {
    return view('admin.include.home');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
});

Route::get('/yonetim/moduller',[ModulController::class,'index'])->name('moduller');
Route::post('/yonetim/modul-ekle',[ModulController::class,'modulekle'])->name('modul-ekle');
