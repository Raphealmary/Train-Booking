<?php

namespace App\Http\Controllers;

use App\Models\Trainadmin;
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
        $shows = UserBookRecords::with("route2")
            ->with("route")
            ->orderBy("created_at","desc")
            ->paginate(4);

        return view('admin.dashboard', compact("shows"));
    }
    public function logout(Request $re)
    {

        Auth::guard("admin")->logout();
        $re->session()->invalidate();

        return redirect()->route("adminlogin");
    }
}
