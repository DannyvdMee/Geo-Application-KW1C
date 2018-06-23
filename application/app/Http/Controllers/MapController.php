<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Teacher\PoiController;
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
		return view('map/index', ['pois' => $this->recievePOI()]);
	}

	public function recievePOI()
	{
		foreach($this->PoiController->getPoiForMap())
	}
}
