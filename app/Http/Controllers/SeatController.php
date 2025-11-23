<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\Coach;
use App\Models\Trains;
use Exception;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function index()
    {
        $showCoach = Coach::get();
        $showTrain = Trains::get();
        return view("admin.seats", compact("showCoach", "showTrain"));
    }
    public function store(Request $re)
    {
        $show = $re->validate([
            "trains_id" => ["integer", "required"],
            "coaches_id" => ["integer", "required"],
            "seat_no" => ["integer", "required"],
            "index" => ["alpha", "required"],
        ]);
        try {

            $range = range(1, $show["seat_no"]);
            foreach ($range as $ranges) {
                $seatNumber = $show["index"] . $ranges;

                Seat::create([
                    "trains_id" => $show["trains_id"],
                    "coaches_id" => $show["coaches_id"],
                    "seat_no" => $seatNumber
                ]);
            }

            return back()->with(
                [
                    "type" => "success",
                    "msg" => "Successfully Added Seats for Trains Coach"
                ]

            );
        } catch (Exception $e) {

            return back()->with([
                "type" => "error",
                "msg" => "Error Inserting"
            ]);
        }
    }
}
