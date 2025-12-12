<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use App\Models\Trains;
use App\Models\Coach;
use App\Models\UserBookRecords;
use App\Models\Schedule;
use App\Models\Seat;
use App\Models\User;
use App\Models\Route;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserBookRecordsController extends Controller
{

    function index()
    {
        $showCoach = Coach::get();
        $showRoute = Route::get();
        $showTrain = Trains::get();
        return view("index", compact("showCoach", "showTrain", "showRoute"));
    }
    function userBook()
    {
        $user = Auth::user()->id;
        $shows = UserBookRecords::where("users_id", $user)
            ->with("route2")
            ->with("route")
            ->get();

        return view('dashboard', compact("shows"));
    }

    function print(Request $re)
    {
        $show = $re->validate([
            "bookingid" => ["required", "string"]
        ]);

        $data = UserBookRecords::where("booking_id", $show["bookingid"])
            ->with("route2")
            ->with("route")
            ->first();

        if ($data) {
            $pdf = PDF::loadView("printTicket", compact("data"));
            //return $pdf->stream("ticket.pdf");
            return $pdf->download("ticket.pdf");
        } else {
            return back()->with(["type" => "error", "msg" => "Ticket receipt not Found"]);
        }
    }





    function store(Request $re)
    {

        $valid = $re->validate([
            "trainBooking" => ["required"],
            "coachBooking" => ["required"],
            "seatBooking" => ["required"],
            "departBooking" => ["required", "integer"],
            "arrivalBooking" => ["required", "integer"],
            "timeArrivalBooking" => ["required"],
            "timeDepartBooking" => ["required"],
            "priceBooking" => ["required"],
            "orignalPriceBooking" => ["required"],
            "dateBooking" => ["required"],
            "passengerBooking" => ["required", "integer"],
            "fullname" => ["required"],
            "phone" => ["required"],
            "email" => ["required", "email"]
        ]);

        $result = Schedule::where("origin_id", $valid["departBooking"])
            ->where("destination_id", $valid["arrivalBooking"])
            ->first();

        if (number_format($result->price, 00) !== $valid["orignalPriceBooking"]) {
            return redirect()->back()->with([
                "type" => "warning",
                "msg" => "Error Evaluating price"
            ]);
        }
        if (number_format(($result->price * $valid["passengerBooking"]), 00) !== $valid["priceBooking"]) {
            return redirect()->back()->with([
                "type" => "warning",
                "msg" => "Error Evaluating Price"
            ]);
        }
        
        try {
            $updateShow = UserBookRecords::create([
                "users_id" => Auth::user()->id,
                "booking_id" => Str::upper(Str::random(4)) . rand(2000, 9999),
                "trainBooking" => $valid["trainBooking"],
                "coachBooking" => $valid["coachBooking"],
                "seatBooking" => $valid["seatBooking"],
                "departBooking" => $valid["departBooking"],
                "arrivalBooking" => $valid["arrivalBooking"],
                "timeArrivalBooking" => $valid["timeArrivalBooking"],
                "timeDepartBooking" => $valid["timeDepartBooking"],
                "priceBooking" => $valid["priceBooking"],
                "orignalPriceBooking" => $valid["orignalPriceBooking"],
                "dateBooking" => $valid["dateBooking"],
                "passengerBooking" => $valid["passengerBooking"],
                "fullname" => $valid["fullname"],
                "phone" => $valid["phone"],
                "email" => $valid["email"],

            ]);
            if ($updateShow) {
                Seat::where("seat_no", $valid["seatBooking"])->update(["status" => "booked"]);
                return redirect()->back()->with([
                    "type" => "success",
                    "msg" => "Order is Booked for  {$valid['trainBooking']}  {$valid['coachBooking']} 'seat' {$valid['seatBooking']}"
                ]);
            } else {
                return redirect()->back()->with([
                    "type" => "error",
                    "msg" => "Error opps Occured"
                ]);
            }
        } catch (Exception $e) {

            return redirect()->back()->with([
                "type" => "error",
                "msg" => "Error opps Occured"
            ]);
        };
    }

    function bookings()
    {
        $shows = UserBookRecords::with("route2")
            ->with("route")
            ->get();

        return view('admin.bookings', compact("shows"));
    }

    function users()
    {
        $showUsers = User::get();

        return view("admin.allUsers", compact("showUsers"));
    }
}
