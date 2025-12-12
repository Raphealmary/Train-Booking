<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Schedule;
use App\Models\Trains;
use App\Models\Coach;
use App\Models\Seat;
use App\Models\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Reservation extends Controller
{
    public function index()
    {
        $showCoach = Coach::get();
        $showRoute = Route::get();
        $showTrain = Trains::get();
        return view("reservation", compact("showCoach", "showTrain", "showRoute"));
    }

    public function getSeat($coach_id)
    {
        $showCoach = Seat::where("coaches_id", $coach_id)->get();
        return response()->json($showCoach);
    }

    public function getRoute($id)
    {
        $destination = Schedule::where("origin_id", $id)
            ->with("route")
            ->get();

        return $destination;
    }

    public function reserve(Request $re)
    {
        if (Auth::check()) {

            $show = $re->validate([
                "depart" => ["required", "numeric"],
                "destination" => ["required", "numeric"],
                "passenger" => ["required", "numeric"],
                "travelDate" => ["required", "date"],
            ]);
            // origin_id 	destination_id
            $result = Schedule::where("origin_id", $show["depart"])
                ->where("destination_id", $show["destination"])
                ->with("route2")
                ->with("route")
                ->with("train")
                ->get();

            $showResult = [];
            foreach ($result as $v) {

                $showResult[] = [
                    "origin_id" => $v->origin_id,
                    "destination_id" => $v->destination_id,
                    "trainName" => ucfirst($v->train->name),
                    "start" => $v->route2->journey_route,
                    "end" => $v->route->journey_route,
                    "price" => number_format(($v["price"] * $show["passenger"]), 00),
                    "arrival" => Carbon::parse($v["arrival"])->format("H:i A"),
                    "departure" => Carbon::parse($v["departure"])->format("H:i A"),
                    "passenger" => $show["passenger"],
                    "originalPrice" => number_format($v["price"], 00),
                    "date" => Carbon::parse($show["travelDate"])->format("F d, Y"),
                ];
            }


            return $showResult;
        } else {
            return redirect("/login");
        }
    }


    function chartSeat()
    {

        $showSeat = Seat::with("train")->with("coach")->select("trains_id", "coaches_id",  DB::raw("count(seat_no) as total"))
            ->groupBy("coaches_id", "trains_id")
            ->get();

        return $showSeat;
    }
}
