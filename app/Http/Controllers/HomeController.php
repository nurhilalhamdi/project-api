<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(Request $request): RedirectResponse
    {
        if (Auth::check()) {
            return redirect("/dashboard");
        } else {
            return redirect("/login");
        }
    }
}
