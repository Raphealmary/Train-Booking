<?php

use App\Http\Controllers\TrainadminController;
use App\Http\Controllers\TrainController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\RouteController;
use App\Models\Seat;
use Illuminate\Support\Facades\Route;

//guest Middleware

Route::prefix("admin")->group(function () {
    Route::get("/login", [TrainadminController::class, "login"])->name("adminlogin");
    Route::post("/login", [TrainadminController::class, "postlogin"])->name("postlogin");
});


//admin authenticated
Route::middleware(["adminSecure"])->group(function () {
    Route::prefix("admin")->name("admin")->group(function () {
        Route::get("/dashboard", [TrainadminController::class, "admindashboard"])->name("dashboard");
        Route::get("/train", [TrainController::class, "index"])->name("train");
        Route::post("/train", [TrainController::class, "store"])->name("trainStore");
        Route::get("/coach", [CoachController::class, "index"])->name("coach");
        Route::post("/coach", [CoachController::class, "store"])->name("coachStore");
        Route::get("/seat", [SeatController::class, "index"])->name("seat");
        Route::post("/seat", [SeatController::class, "store"])->name("seatStore");
        Route::get("/schedule", [ScheduleController::class, "index"])->name("schedule");
        Route::post("/schedule", [ScheduleController::class, "store"])->name("scheduleStore");
        Route::get("/route", [RouteController::class, "index"])->name("route");
        Route::post("/route", [RouteController::class, "store"])->name("routeStore");
        Route::get("/logout", [TrainadminController::class, "logout"])->name("logout");
    });
});
