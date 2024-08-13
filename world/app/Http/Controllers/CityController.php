<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\City;
class CityController extends Controller
{
    public function index(){
        $cities = City::where("status", "=", "1")->paginate(25);

        return view("cities.index",compact("cities"));
    }

    public function item($id){
        $countries = City::where("status", "=", "1")->where("id",$id)->first();
        
        return view("countries.item",compact("countries"));


    }
}
