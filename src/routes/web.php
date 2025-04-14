<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FashionablyController;



Route::middleware('auth')->group(function () {
     Route::get('/', [FashionablyController::class, 'index']);
 });

Route::get('/admin', [FashionablyController::class, 'admin']);
Route::get('/confirm', [FashionablyController::class, 'confirm']);
Route::get('/thanks', [FashionablyController::class, 'thanks']);
Route::get('/register', [FashionablyController::class, 'register']);
Route::get('/admin/search', [FashionablyController::class, 'search']);



Route::post('/confirm', [FashionablyController::class, 'check']);
Route::post('/', [FashionablyController::class, 'back']);
Route::post('/thanks', [FashionablyController::class, 'store']);
Route::post('/return', [FashionablyController::class, 'return']);
Route::post('/admin', [FashionablyController::class, 'remove']);
