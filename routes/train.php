<?php

use Illuminate\Http\Request;
use App\Models\Trains;
use App\Models\Coach;
use App\Http\Controllers\UserBookRecordsController;
use App\Http\Controllers\Reservation;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get("/", function () {
    return view("index");
});

Route::middleware(["auth"])->group(function () {
    Route::post("/user-bookings", [UserBookRecordsController::class, "store"])->name("userBookings");
    Route::get("/reservation", [Reservation::class, "index"]);
    Route::post("/reservationpost", [Reservation::class, "reserve"])->name("reservation");
    Route::get("/get-seat/{coach_id}", [Reservation::class, "getSeat"]);
    Route::get("/get-route/{id}", [Reservation::class, "getRoute"]);
});
