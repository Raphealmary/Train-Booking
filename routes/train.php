<?php

use Illuminate\Http\Request;
use App\Models\Trains;
use App\Models\Coach;
use App\Models\Seat;
use App\Http\Controllers\Reservation;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get("/", function () {
    return view("index");
});


Route::get("/reservation", [Reservation::class, "index"]);
Route::post("/reservation", [Reservation::class, "reserve"])->name("reservation");
Route::get("/get-seat/{coach_id}", [Reservation::class, "getSeat"]);
