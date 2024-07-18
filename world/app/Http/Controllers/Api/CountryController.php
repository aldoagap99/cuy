<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function list() {
        $countries = Country::orderBy('name', 'asc')->get();

        $list = [];

        foreach ($countries as $country) {

            $object = [
                'id' => $country->id,
				'name' => $country->name,
                'continent' => $this->getContinentName($country),
                'population' => $country->population,
                'language' => $country->language,
                'currency' => $country->currency,
            ];

            array_push($list, $object);
        }

        return response()->json($list);
    }

    public function item($id) {

    	$country = Country::findOrFail($id);

    	$object = [
        	'id' => $country->id,
        	'name' => $country->name,
            'continent' => $country->continent,
            'population' => $country->population,
            'language' => $country->language,
            'currency' => $country->currency,
        	
    	];

    	return response()->json($object);
	}

    public function create(Request $request) {

    	$data = $request->validate([
            'name' => 'required',
        	'continent' => 'required|numeric',
        	'population' => 'required',
        	'language' => 'required',
        	'currency' => 'required',
    	]);
   	 
    	$country = Country::create([
            'name' => $data['name'],
        	'continent' => $data['continent'],
        	'population' => $data['population'],
        	'language' => $data['language'],
        	'currency' => $data['currency'],
    	]);

    	if($country) {

        	$response = [
            	'response' => 1,
            	'message' => 'country created successfully',
            	'country' => $country
        	];

        	return response()->json($response);
    	} else {
        	$response = [
            	'response' => 0,
            	'message' => 'There was an error saving data',
        	];
    	}
	}   

    public function update(Request $request) 
    {
        try {
            // Validar los datos de entrada
            $data = $request->validate([
                'id' => 'required|numeric',
                'name' => 'required|string',
                'continent' => 'required|numeric',
                'population' => 'required|numeric',
                'language' => 'required|string',
                'currency' => 'required|string',
            ]);

            // Buscar el país por id
            $country = Country::find($data['id']);

            if (!$country) {
                return response()->json([
                    'response' => 0,
                    'message' => 'Country not found',
                ], 404);
            }

            // Actualizar los campos del país
            $country->name = $data['name'];
            $country->continent = $data['continent'];
            $country->population = $data['population'];
            $country->language = $data['language'];
            $country->currency = $data['currency'];

            // Guardar los cambios
            if ($country->save()) {
                // Refrescar el modelo
                $country->refresh();

                // Respuesta exitosa
                return response()->json([
                    'response' => 1,
                    'message' => 'Country updated successfully',
                    'country' => $country
                ]);
            } else {
                // Respuesta en caso de error al guardar
                return response()->json([
                    'response' => 0,
                    'message' => 'There was an error saving data',
                ], 500);
            }
        } catch (\Exception $e) {
            // Manejo de excepciones generales
            return response()->json([
                'response' => 0,
                'message' => 'An error occurred: ' . $e->getMessage(),
            ], 500);
        }
    }
    public function getContinentName($country) {
        switch ($country->continent) {
            case 1:
                $continent_name = 'Africa';
                break;
            case 2:
                $continent_name = 'Antartida';
                break;
            case 3:
                $continent_name = 'Norteamerica';
                break;
            case 4:
                $continent_name = 'Sudamerica';
                break;
            case 5:
                $continent_name = 'Asia';
                break;
            case 6:
                $continent_name = 'Europa';
                break;
            case 7:
                $continent_name = 'Oceania';
                break;
            default:
                $continent_name = 'Pangea';
                break;
        }
        return $continent_name;
    }
}