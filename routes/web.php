<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IkanController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PemasokController;



Route::resource('ikan', IkanController::class);
Route::post('ikan/search', [IkanController::class, 'search'])->name('ikan.search');
Route::resource('pesanan', PesananController::class);
Route::resource('pemasok', PemasokController::class);




Route::get('/', function () {
    return view('app');
});
