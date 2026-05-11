<?php

use App\Http\Controllers\TaxController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaxController::class, 'index']);
Route::post('/', [TaxController::class, 'show']);
