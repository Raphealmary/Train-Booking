<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Coach;
use App\Models\Trains;
use App\Models\Route;
use Exception;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $showRoute = Route::get();
        $showTrain = Trains::get();
        return view("admin.schedule", compact("showRoute", "showTrain",));
    }

    public function store(Request   $re)
    {
        $show = $re->validate([

            "origin_id" => ["required", "integer"],
            "destination_id" => ["required", "integer"],
            "distance" => ["required", "alpha_num"],
            "trains_id" => ["required", "integer"],
            "departure" => ["required"],
            "arrival" => ["required"],
            "price" => ["required", "integer", "numeric"],


        ], [
            "origin_id" => "field cannot be empty",
            "destination_id" => "field cannot be empty",
            "trains_id" => "field cannot be empty"
        ]);
        try {
            Schedule::create($show);
            return back()->with([
                "type" => "success",
                "msg" => "Schedule Added Successfully"
            ]);
        } catch (Exception $e) {
            return back()->with([
                "type" => "error",
                "msg" => "Error Inserting"
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
