<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function dashboard(): Response
    {
        return response()->view("dashboard.home", [
            "title" => "Dashboard",
            "nama" => Auth::user()->nama,
            "id" => Auth::user()->id,
        ]);
    }
}
