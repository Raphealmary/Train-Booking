<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('api/login', function () {
    return response()->json([
        'api' => 'fullAccess'
    ]);
});
//->middleware('auth:sanctum');

route::post("/re", function (Request $re) {

    $store = $re->validate([
        "username" => ["required", "alpha"],
        "password" => ["required"]

    ]);


    if ($store["username"] == "Raphealmary") {
        return "Access" . json_encode($store);
    } else {
        return "no result found $re->username";
    }
});
