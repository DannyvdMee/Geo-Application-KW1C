<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Teacher\PoiController;
use App\Poi;
use App\Route;
use Illuminate\Http\Request;

class MapController extends Controller
{
	//Initialisatie
	public function index()
	{
		$pois = Poi::where('active', '=', TRUE)->get();

		return view('map/index', ['pois' => $pois]);
	}

	public function retrieveMarkerInfo($id)
	{
		$pois = [
			['avans', 51.6886659, 5.2869727, 'Description of Avans University POI'],
			['kw1c', 51.6904646, 5.2867472, 'Description of KW1C POI'],
			['cs', 51.689968, 5.295078, 'Description of Central Station POI'],
		];

		return $info;
	}
}
