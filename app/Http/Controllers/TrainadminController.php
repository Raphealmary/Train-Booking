<?php

namespace App\Http\Controllers;

use App\Models\Trainadmin;
use App\Models\Trains;
use App\Models\Seat;
use App\Models\User;
use App\Models\UserBookRecords;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainadminController extends Controller
{
    public function login()
    {
        return view("admin.login");
    }
    public function postlogin(Request $re)
    {
        $valid = $re->validate(
            [
                "email" => "required|email",
                "password" => "required"
            ]

        );

        if (Auth::guard("admin")->attempt($valid)) {
            $re->session()->regenerate();
            return redirect()->route("admindashboard");
        } else {
            return redirect()->route("adminlogin")->with("status", "invalid credentials");
        }
    }
    public function admindashboard()
    {
        $totalUsers = User::count();
        $totalSeats = Seat::count();
        $totalPrice = UserBookRecords::selectRaw("SUM(REPLACE(priceBooking,',','')) as total")->value("total");
        $totalBookings = UserBookRecords::count();
        $shows = UserBookRecords::with("route2")
            ->with("route")
            ->orderBy("created_at", "desc")
            ->paginate(3);

        return view('admin.dashboard', compact("shows", "totalBookings", "totalSeats", "totalPrice", "totalUsers"));
    }
    public function logout(Request $re)
    {

        Auth::guard("admin")->logout();
        $re->session()->invalidate();

        return redirect()->route("adminlogin");
    }
}
