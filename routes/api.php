<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(BarangController::class)->group(function(){
    Route::get('/barang', 'index');
    Route::get('/barang/{id}', 'show');
    Route::post('/barang', 'store');
    Route::put('/barang/{id}', 'update');
    Route::delete('/barang/{id}', 'destroy');
});