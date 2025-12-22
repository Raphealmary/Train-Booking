<?php

namespace App\Http\Controllers;

use App\Models\UserBookRecords;
use App\Models\Payment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use App\Models\Seat;

class PaymentController extends Controller
{
    function index()
    {
        $showPay = Payment::all();

        return view("admin.paymentSetting", compact("showPay"));
    }
    function store(Request $re)
    {


        $store =  $re->validate([
            "Payment_Type" => ["required", "alpha"],
            "secret_key" => ["required"],

        ]);
        $store["secret_key"] = Crypt::encryptString($store["secret_key"]);
        try {

            $check = Payment::where("Payment_Type", $store["Payment_Type"])->get();
            if ($check->count() > 0) {
                return redirect()->back()->with([
                    "type" => "warning",
                    "msg" => "Already Instead to DB"
                ]);
            } else {
                Payment::create($store);

                return redirect()->back()->with([
                    "type" => "success",
                    "msg" => "Successfully Added Payment Method"
                ]);
            }
        } catch (Exception $e) {
            // return $e;
            return redirect()->back()->with([
                "type" => "error",
                "msg" => "Error opps Occured"
            ]);
        };
    }



    function callback(Request $re, $params)
    {
        if ($params == "Flutterwave") {

            $paySecret = Payment::where("Payment_Type", "flutterwave")->first();
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . Crypt::decryptString($paySecret->secret_key),
                'Content-Type'  => 'application/json',
            ])->get("https://api.flutterwave.com/v3/transactions/{$re->transaction_id}/verify",);

            // return $response;
            if ($response["data"]["status"] === "successful" && $response["status"] === "success") {
                $result = UserBookRecords::where("reference", $re->tx_ref)
                    ->where("Type", "Flutterwave")
                    ->first();

                if ($result->count() > 0) {
                    $amount = ($response["data"]["amount"]) . ".00";
                    $priceDb = $result->priceBooking;
                    if ($amount === $priceDb) {
                        $result->update(["status" => "paid"]);
                        Seat::where("seat_no", $result->seatBooking)->update(["status" => "booked"]);
                        return redirect()->back()->with([
                            "type" => "success",
                            "msg" => "Order is Booked for  $result->trainBooking  $result->coachBooking 'seat' $result->seatBooking"
                        ]);
                    } else {
                        return redirect()->back()->with([
                            "type" => "error",
                            "msg" => "Error opps Occured in flutterwave Payment"
                        ]);
                    }
                }
            }
        }

        if ($params == "PayStack") {
            $paySecret = Payment::where("Payment_Type", "paystack")->first();
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . Crypt::decryptString($paySecret->secret_key),
                'Content-Type'  => 'application/json',
            ])->get("https://api.paystack.co/transaction/verify/{$re->reference}");

            if ($response["data"]["status"] == "success") {
                $result = UserBookRecords::where("reference", $re->reference)
                    ->where("Type", "PayStack")
                    ->first();

                if ($result->count() > 0) {

                    $amount = ($response["data"]["amount"] / 100) . ".00";
                    $priceDb = $result->priceBooking;
                    if ($amount === $priceDb) {
                        $result->update(["status" => "paid"]);
                        Seat::where("seat_no", $result->seatBooking)->update(["status" => "booked"]);
                        return redirect()->back()->with([
                            "type" => "success",
                            "msg" => "Order is Booked for  $result->trainBooking  $result->coachBooking 'seat' $result->seatBooking"
                        ]);
                    } else {
                        return redirect()->back()->with([
                            "type" => "error",
                            "msg" => "Error opps Occured in Paystack Payment"
                        ]);
                    }
                }
            }
        }
    }
}
