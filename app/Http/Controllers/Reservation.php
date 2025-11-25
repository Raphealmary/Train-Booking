<?php

namespace App\Http\Controllers;

use App\Models\Trains;
use App\Models\Coach;
use App\Models\Seat;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class Reservation extends Controller
{
    public function index()
    {
        $showCoach = Coach::get();
        $showTrain = Trains::get();
        return view("reservation", compact("showCoach", "showTrain"));
    }

    public function getSeat($coach_id)
    {
        $showCoach = Seat::where("coaches_id", $coach_id)->get();
        return response()->json($showCoach);
    }

    public function reserve()
    {
        if (Auth::check()) {
            return [
                "status" => "happy"
            ];
        } else {
            return redirect("/login");
        }
    }
}
