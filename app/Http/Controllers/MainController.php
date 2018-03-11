<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function getHome()
    {
        return view('index', ['isHome' => true]);
    }

    public function getCompany()
    {
        return view('company');
    }

    public function getServices()
    {
        return view('services');
    }

    public function getRates()
    {
        return view('rates');
    }
}
