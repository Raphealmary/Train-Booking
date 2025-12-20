<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;

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
            Payment::create($store);

            return redirect()->back()->with([
                "type" => "success",
                "msg" => "Successfully Added Payment Method"
            ]);
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
        if ($params == "flutterwave") {

            $paySecret = Payment::where("Payment_Type", "flutterwave")->first();
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . Crypt::decryptString($paySecret->secret_key),
                'Content-Type'  => 'application/json',
            ])->get("https://api.flutterwave.com/v3/transactions/{$re->transaction_id}/verify",);

            return $response->json();
        }

        if ($params == "paystack") {
            $paySecret = Payment::where("Payment_Type", "paystack")->first();
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . Crypt::decryptString($paySecret->secret_key),
                'Content-Type'  => 'application/json',
            ])->get("https://api.paystack.co/transaction/verify/{$re->reference}");

            return $response->json();
        }
    }
}
