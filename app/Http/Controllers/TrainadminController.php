<?php

namespace App\Http\Controllers;

use App\Models\Trainadmin;
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
        return view("admin.dashboard");
    }
    public function logout(Request $re)
    {

        Auth::guard("admin")->logout();
        $re->session()->invalidate();

        return redirect()->route("adminlogin");
    }
}
