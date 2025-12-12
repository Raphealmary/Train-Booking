<?php

use App\Http\Controllers\UserBookRecordsController;
use App\Http\Controllers\Reservation;
use Illuminate\Support\Facades\Route;



Route::get("/", [UserBookRecordsController::class, "index"])->name("home");
Route::get("/get-route/{id}", [Reservation::class, "getRoute"]);
Route::middleware(["auth"])->group(function () {
    Route::post("/user-bookings", [UserBookRecordsController::class, "store"])->name("userBookings");
    Route::get("/reservation", [Reservation::class, "index"])->name("reservationIndex");
    Route::post("/reservationpost", [Reservation::class, "reserve"])->name("reservation");
    Route::get("/get-seat/{coach_id}", [Reservation::class, "getSeat"]);
});
