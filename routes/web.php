<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminYonetim;
use App\Http\Controllers\ModulController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
});

Route::get('/yonetim',[AdminYonetim::class,'home'])->name('home');
Route::get('/yonetim/moduller',[ModulController::class,'index'])->name('moduller');
Route::post('/yonetim/modul-ekle',[ModulController::class,'modulekle'])->name('modul-ekle');
Route::get('/yonetim/liste/{modul}',[AdminYonetim::class,'liste'])->name('liste');
Route::get('/yonetim/ekle/{modul}',[AdminYonetim::class,'ekle'])->name('ekle');
