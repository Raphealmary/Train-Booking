<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Exception;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        return view("admin.routes");
    }
    public function store(Request $re)
    {
        $show = $re->validate([
            "journey_route" => ["required", "string"]
        ]);

        try {
            Route::create($show);
            return back()->with([
                "type" => "success",
                "msg" => $show["journey_route"] . " Journey Route Added Successfully"
            ]);
        } catch (Exception $e) {
            return back()->with([
                "type" => "error",
                "msg" => "Error Inserting" . $show["journey_route"]
            ]);
        }
    }
}
