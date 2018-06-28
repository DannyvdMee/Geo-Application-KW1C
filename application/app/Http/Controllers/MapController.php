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
		$info = Poi::find($id);

		return $info;
	}
}
