<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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
            //return $e;
            return redirect()->back()->with([
                "type" => "error",
                "msg" => "Error opps Occured"
            ]);
        };
    }



    function callback()
    {
        return "callback called";
    }
}
