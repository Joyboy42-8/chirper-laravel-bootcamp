<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;

Route::get("/", [ChirpController::class, "index"])->name("chirps.index");
Route::resource("chirps", ChirpController::class)
    ->only(["store", "edit", "update", "destroy"]);