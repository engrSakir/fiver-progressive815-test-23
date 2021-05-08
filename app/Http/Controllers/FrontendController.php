<?php

namespace App\Http\Controllers;

use App\Truck;

class FrontendController extends Controller
{
    public function index()
    {
        $trucks = Truck::orderBy('id', 'desc')->get();
        return view('welcome', compact('trucks'));
    }
}
