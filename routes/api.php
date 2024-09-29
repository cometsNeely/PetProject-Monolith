<?php

use App\Http\Controllers\ShowController;

Route::get('/shows', [ShowController::class, 'index']);