<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Teacher\PoiController;
use App\Poi;
use App\Route;
use Illuminate\Http\Request;

class MapController extends Controller
{
	private $PoiController;

	public function __construct(PoiController $PoiController)
	{
		$this->PoiController = $PoiController;
	}

	public function index()
	{
		$pois = Poi::where('active', '=', TRUE)->get();

		return view('map/index', ['pois' => $pois]);
	}

	public function getPOIS()
	{
		$pois = Poi::where('active', '=', TRUE)->get();

		$json = json_encode($pois);

		return $json;
	}

	public function retrieveMarkerInfo($id)
	{
		$info = Poi::where('url_id', '=', $id)->get();

		return $info;
	}
}
