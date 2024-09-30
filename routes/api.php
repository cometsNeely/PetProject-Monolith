<?php

use App\Http\Controllers\ShowController;

Route::post('/shows', [ShowController::class, 'index']);