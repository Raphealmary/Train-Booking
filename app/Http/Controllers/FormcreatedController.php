<?php

namespace App\Http\Controllers;

use App\Models\Formcreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FormcreatedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("create");
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
    public function store(Request $request)
    {
        $insert = $request->validate([
            "username" => "alpha|required",
            "password" => "confirmed|required"
        ]);

        $insert["password"] = Hash::make($insert["password"]);

        Formcreated::create($insert);

        return redirect()->route("Formcreated.index")->with(["success" => "successfully inserted"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Formcreated $formcreated)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formcreated $formcreated)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Formcreated $formcreated)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formcreated $formcreated)
    {
        //
    }
}
