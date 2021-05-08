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
            return datatables::of($data)
               ->addColumn('brand', function($data) {
                    return $data->brand->name ?? '';
                })->addColumn('action', function($data) {
                    return '<a href="'.url('#').'" class="btn btn-warning"> Edit </a>';
                })
                ->rawColumns(['brand', 'action'])
                ->make(true);
        }else{
            return view('welcome');
        }
    }
}
