<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBookRecords extends Model
{
    protected $fillable = [
        "users_id",
        "booking_id",
        "trainBooking",
        "coachBooking",
        "seatBooking",
        "departBooking",
        "arrivalBooking",
        "timeArrivalBooking",
        "timeDepartBooking",
        "priceBooking",
        "orignalPriceBooking",
        "dateBooking",
        "passengerBooking",
        "fullname",
        "phone",
        "email",

    ];


    public function route()
    {
        return $this->belongsTo(Route::class, "departBooking", "id");
    }
    public function route2()
    {
        return $this->belongsTo(Route::class, "arrivalBooking", "id");
    }
}
