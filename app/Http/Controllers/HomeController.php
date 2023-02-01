<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('Home.home');
    }

    public function premium()
    {
        return view('Home.premium');
    }

    public function telecharger()
    {
        return view('Home.telecharger');
    }

    public function assistance()
    {
        return view('Home.assistance');
    }
}
