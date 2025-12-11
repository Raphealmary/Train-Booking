<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\Coach;
use App\Models\Trains;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeatController extends Controller
{
    public function index()
    {
        $showCoach = Coach::get();
        $showTrain = Trains::get();

        $showSeat =  $showSeat = Seat::with("train")->with("coach")->select("trains_id", "coaches_id",  DB::raw("count(seat_no) as total"))
            ->groupBy("coaches_id", "trains_id")
            ->paginate(5);
        //->get();
        //return $showSeat;
        return view("admin.seats", compact("showCoach", "showTrain", "showSeat"));
    }
    public function store(Request $re)
    {
        $show = $re->validate([
            "trains_id" => ["integer", "required"],
            "coaches_id" => ["integer", "required"],
            "seat_no" => ["integer", "required"],
            "index" => ["alpha", "required"],
        ]);

        $checkWhere = Seat::where("trains_id", $show["trains_id"])
            ->where("coaches_id", $show["coaches_id"])
            ->where("seat_no", $show["seat_no"]);
        if ($checkWhere) {
            return back()->with([
                "type" => "error",
                "msg" => "Already Inserted Seats"
            ]);
        }
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
