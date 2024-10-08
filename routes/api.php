<?php

use App\Http\Controllers\ShowController;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth')->group(function () {

    Route::post('/shows', [ShowController::class, 'index']);

//});