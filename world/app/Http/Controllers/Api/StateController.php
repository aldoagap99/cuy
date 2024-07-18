<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function list(){
        $states = State::orderBy('name','asc')->get();

        $list=[];
        foreach ($states as $state){
        
            $object = [
                'id'=> $state->id,
                'name'=>$state->name,
                'country_id'=>$state->country,
            
            ];
            array_push($list,$object);

        }
        return response()->json($list);
    }

    public function item($id) {

    	$state  = State::findOrFail($id);

    	$object = [
        	    'id'=> $state->id,
                'name'=>$state->name,
                'country_id'=>$state->country,
    	];

    	return response()->json($object);
	}

	public function create(Request $request) {

    	$data = $request->validate([
        	'name' => 'required',
        	'country_id' => 'required|numeric',
    	]);
   	 
    	$state = State::create([

            'name'=> $data['name'],
        	'country_id'=> $data['country_id'],
    	]);

    	if($state) {

        	$response = [
            	'response' => 1,
            	'message' => 'state created successfully',
            	'state' => $state
        	];

        	return response()->json($response);
    	} else {
        	$response = [
            	'response' => 0,
            	'message' => 'There was an error saving data',
        	];
    	}
	}

	public function update(Request $request) {

    	$data = $request->validate([
        	'name' => 'required',
        	'country_id' => 'required|numeric',
    	]);

    	$state = State::where('id', '=', $data['id'])->first();
        $state->name = $data['name'];
    	$state->country_id = $data['country_id'];
    	if($state->save()) {

        	$state->refresh();

        	$response = [
            	'response' => 1,
            	'message' => 'country updated successfully successfully',
            	'state' => $state
        	];

        	return response()->json($response);
    	} else {
        	$response = [
            	'response' => 0,
            	'message' => 'There was an error saving data',
        	];
    	}

    }
}
