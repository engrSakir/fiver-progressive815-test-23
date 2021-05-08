<?php

namespace App\Http\Controllers;

use App\Truck;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FrontendController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()){
            $data = Truck::all();

            if(!empty($request->filter_brand)){
                $data = Truck::where('brand_id', $request->filter_brand)->get();
            }
            if(!empty($request->year_of_manufacture)){
                $data = Truck::where('year_of_manufacture', $request->year_of_manufacture)->get();
            }
            if(!empty($request->owner_s_name_and_surname)){
                $data = Truck::where('owner_s_name_and_surname', $request->owner_s_name_and_surname)->get();
            }
            if(!empty($request->number_of_owners)){
                $data = Truck::where('number_of_owners', $request->number_of_owners)->get();
            }
            if(!empty($request->comments)){
                $data = Truck::where('comments', $request->comments)->get();
            }
            return datatables::of($data)
               ->addColumn('brand', function($data) {
                    return $data->brand->name ?? '';
                })->addColumn('action', function($data) {
                    return '<a href="'.url('#').'" class="btn btn-warning"> Edit </a>';
                })
                ->rawColumns(['brand', 'action'])
                ->make(true);
        }else{
            $trucks = Truck::all();
            return view('welcome', compact('trucks'));
        }
    }
}
