<?php

use App\Http\Controllers\Auth\Logout;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Login;

// Public routes who show all chirps
Route::get("/", [ChirpController::class, "index"])->name("chirps.index");

// Actions users can do on chirps only if they are logged in
Route::resource("chirps", ChirpController::class)
    ->only(["store", "edit", "update", "destroy"])->middleware("auth");

// Auth (Visible only for visitors)
Route::middleware("guest")->group(function() {
    // Register Routes 
    Route::view("/register", "auth.register")->name("register");
    Route::post("/register", Register::class)->name("registered");
    // Login Routes
    Route::view("/login", "auth.login")->name("login");
    Route::post("/login", Login::class)->name("logged-in");
});

// Logout Routes (Visible only for logged in users)
Route::post("/logout", Logout::class)->middleware("auth")->name("logout");
