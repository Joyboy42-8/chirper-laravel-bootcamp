<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;

Route::get('/', [ChirpController::class, "index"]);
Route::post("/create", [ChirpController::class, "store"]);
