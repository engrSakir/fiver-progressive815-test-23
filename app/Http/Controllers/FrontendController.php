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
            $data  = Truck::where( function($query) use($request){
                return $request->filter_brand ?
                       $query->from('trucks')->where('brand_id',$request->filter_brand) : '';
           })
           ->where(function($query) use($request){
                return $request->year_of_manufacture ?
                       $query->from('trucks')->where('year_of_manufacture',$request->year_of_manufacture) : '';
           })
           ->where(function($query) use($request){
                return $request->owner_s_name_and_surname ?
                       $query->from('trucks')->where('owner_s_name_and_surname',$request->owner_s_name_and_surname) : '';
           })
           ->where(function($query) use($request){
                return $request->number_of_owners ?
                       $query->from('trucks')->where('number_of_owners',$request->number_of_owners) : '';
           })
           ->where(function($query) use($request){
                return $request->comments ?
                       $query->from('trucks')->where('comments',$request->comments) : '';
           })

           ->get();


            return datatables::of($data)
               ->addColumn('brand', function($data) {
                    return $data->brand->name ?? '';
                })
                ->rawColumns(['brand'])
                ->make(true);
        }else{
            $trucks = Truck::all();
            return view('welcome', compact('trucks'));
        }
    }
}
