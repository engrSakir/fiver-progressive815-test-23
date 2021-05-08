<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Truck;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(\App\Forms\TruckForm::class, [
            'method' => 'POST',
            'url' => route('store')
        ]);

        $items = Brand::pluck('name', 'id');
        $selectedID = 1;

        return view('home', compact('form', 'items', 'selectedID'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormBuilder $formBuilder)
    {

        $form = $formBuilder->create(\App\Forms\TruckForm::class);
        $form->validate(['year_of_manufacture' => 'required|numeric|min:1900|date_format:Y|before:today']);
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        Truck::create($form->getFieldValues());
        return redirect()->route('index');
        // Do saving and other things...
    }
}
