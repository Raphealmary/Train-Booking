<?php

namespace App\Http\Controllers;

use App\Models\Trains;
use Exception;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $showTrain = Trains::orderBy("name")->get();
        return view("admin.trains", compact("showTrain"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $re)
    {
        $add = $re->validate([
            "name" => ["required", "string"],
            "number" => ["required", "alpha_num"],
            "type" => ["required", "string"],
        ]);
        try {
            Trains::create($add);
            return redirect()->route("admintrain")->with([
                "type" => "success",
                "msg" => "Train Added Successfully"
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
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
