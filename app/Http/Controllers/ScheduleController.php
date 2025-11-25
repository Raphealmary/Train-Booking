<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Coach;
use App\Models\Trains;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $showCoach = Coach::get();
        $showTrain = Trains::get();
        return view("admin.schedule", compact("showCoach", "showTrain"));
    }

    public function store(Request   $request)
    {
        //
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
