<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function list(){
        $cities = City::orderBy('name','asc')->get();

        $list=[];
        foreach ($cities as $city){
        
            $object = [
                'id'=> $city->id,
                'name'=>$city->name,
                'state_id'=>$city->state,
                'isCapital'=>$city->isCapital,
            
            ];
            array_push($list,$object);

        }
        return response()->json($list);
    }



    public function item( $id) {

    	$city  = City::findOrFail($id);

    	$object = [
            'id'=> $city->id,
            'name'=>$city->name,
            'state_id'=>$city->state,
            'isCapital'=>$city->isCapital,
    	];

    	return response()->json($object);
	}

    public function create(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required',
                'state_id' => 'required|numeric',
                'isCapital' => 'nullable|numeric' // Corrigido a nullable
            ]);
    
            $isCapital = isset($data['isCapital']) ? $data['isCapital'] : 0;
    
            $city = City::create([
                'name' => $data['name'],
                'state_id' => $data['state_id'],
                'isCapital' => $isCapital
            ]);
    
            if ($city) {
                $response = [
                    'response' => 1,
                    'message' => 'City created successfully',
                    'city' => $city
                ];
    
                return response()->json($response);
            } else {
                $response = [
                    'response' => 0,
                    'message' => 'There was an error saving data'
                ];
    
                return response()->json($response);
            }
        } catch (\Exception $e) {
            return response()->json([
                'response' => 0,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

}
