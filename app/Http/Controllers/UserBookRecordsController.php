<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use App\Models\Trains;
use App\Models\Coach;
use App\Models\Payment;
use App\Models\UserBookRecords;
use App\Models\Schedule;
use App\Models\Seat;
use App\Models\User;
use App\Models\Route;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
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
            ->paginate(6);

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
            "email" => ["required", "email"],
            "payment" => ["required"],
        ]);

        $result = Schedule::where("origin_id", $valid["departBooking"])
            ->where("destination_id", $valid["arrivalBooking"])
            ->first();

        if ($result->price !== $valid["orignalPriceBooking"]) {
            return redirect()->back()->with([
                "type" => "warning",
                "msg" => "Error Evaluating price"
            ]);
        }
        if (($result->price * $valid["passengerBooking"]) . ".00" !== $valid["priceBooking"]) {
            return redirect()->back()->with([
                "type" => "warning",
                "msg" => "Error Evaluating Price"
            ]);
        }
        try {
            $paySecret = Payment::where("Payment_Type", $valid["payment"])->first();
            if ($valid["payment"] === "free") {
                $updateRecord = UserBookRecords::create([
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
                    "reference" => "RailExpress" . Str::random(12),
                    "status" => "paid",
                    "Type" => "FreePay"
                ]);
                if ($updateRecord) {
                    Seat::where("seat_no", $valid["seatBooking"])->update(["status" => "booked"]);
                    return redirect()->back()->with([
                        "type" => "success",
                        "msg" => "Order is Booked for  {$valid['trainBooking']}  {$valid['coachBooking']} 'seat' {$valid['seatBooking']}"
                    ]);
                } else {
                    return redirect()->back()->with([
                        "type" => "error",
                        "msg" => "Error opps Occured in Free Payment"
                    ]);
                }
            } else {
                if ($paySecret !== null) {
                    if ($valid["payment"] === "paystack") {
                        $reference = "RailExpress" . Str::random(12);
                        $response = Http::withHeaders([
                            'Authorization' => 'Bearer ' . Crypt::decryptString($paySecret->secret_key),
                            'Content-Type'  => 'application/json',
                        ])->post("https://api.paystack.co/transaction/initialize", [
                            "reference" => $reference,
                            "amount" => ($result->price * $valid["passengerBooking"]) * 100,
                            'callback_url' => route("callback", "PayStack"),
                            'email' => $valid["email"],

                        ]);

                        $updateRecord = UserBookRecords::create([
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
                            "reference" => $reference,
                            "status" => "Pending",
                            "Type" => "PayStack"
                        ]);
                        if ($updateRecord) {
                            return redirect($response["data"]["authorization_url"]);
                        } else {
                            return redirect()->back()->with([
                                "type" => "error",
                                "msg" => "Error to Initialize Paystack Payment opps Occured"
                            ]);
                        }
                    } else if ($valid["payment"] === "flutterwave") {
                        $reference = "RailExpress" . Str::random(12);
                        $response = Http::withHeaders([
                            'Authorization' => 'Bearer ' . Crypt::decryptString($paySecret->secret_key),
                            'Content-Type'  => 'application/json',
                        ])->post("https://api.flutterwave.com/v3/payments", [
                            "tx_ref" =>  $reference,
                            "currency" => "NGN",
                            "amount" => ($result->price * $valid["passengerBooking"]),
                            'redirect_url' => route("callback", "Flutterwave"),
                            "customer" => [
                                "email" => $valid["email"],
                                "name" => $valid["fullname"]

                            ],

                        ]);

                        $updateRecord = UserBookRecords::create([
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
                            "reference" => $reference,
                            "status" => "Pending",
                            "Type" => "Flutterwave"
                        ]);
                        if ($updateRecord) {
                            return redirect($response["data"]["link"]);
                        } else {
                            return redirect()->back()->with([
                                "type" => "error",
                                "msg" => "Error to Initialize Flutterwave Payment opps Occured"
                            ]);
                        }
                    }
                } else {
                    return redirect()->back()->with([
                        "type" => "error",
                        "msg" => "(Add Payment Api key from Admin)"
                    ]);
                }
            }
        } catch (Exception $e) {
            //return $e;
            return redirect()->back()->with([
                "type" => "error",
                "msg" => "Error opps Occured (check Internet)"
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
