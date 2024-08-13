<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Country;

class CountryController extends Controller
{
    public function index(){
        $countries = Country::where("status", "=", "1")->paginate(25);

        return view("countries.index",compact("countries"));
    }

    public function item($id){
        $countries = Country::where("status", "=", "1")->where("id",$id)->first();
        
        return view("countries.item",compact("countries"));


    }
}
