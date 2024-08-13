<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\State;
class StateController extends Controller
{
    public function index(){
        $states = State::where("status", "=", "1")->paginate(25);

        return view("states.index",compact("states"));
    }

    public function item($id){
        $states = State::where("status", "=", "1")->where("id",$id)->first();
        
        return view("states.item",compact("states"));


    }
}
