<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExchangeRateController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/latest-rates', [ExchangeRateController::class, 'getLatestRates']);
Route::get('/historical-rates', [ExchangeRateController::class, 'getHistoricalRates']);

