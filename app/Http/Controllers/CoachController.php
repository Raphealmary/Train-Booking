<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trains;
use App\Models\Coach;
use Exception;
use Illuminate\Support\Carbon;

class CoachController extends Controller
{
    public function index()
    {
        $showCoach = Coach::orderBy("coach_type")->get();
        return view("admin.coach", compact("showCoach"));
    }
    public function store(Request $re)
    {
        $store = $re->validate([
            "coach_type" => ["required"]
        ]);
        try {
            Coach::create($store);
            return redirect()->route("admincoach")->with([
                "type" => "success",
                "msg" => "Coach Added Successfully"
            ]);
        } catch (Exception $e) {

            return redirect()->back()->with([
                "type" => "error",
                "msg" => "Error Inserting"
            ]);
        }
    }
}
