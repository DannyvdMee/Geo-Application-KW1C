<?php

namespace App\Repositories\Route;

use App\Route;

class RouteRepository implements RouteInterface
{
	public function getOne($id)
	{
		return Route::findOrFail($id);
	}

	public function getLatest()
	{
		return Route::all()->orderBy('created_at', 'desc')->first();
	}

	public function getAllActive()
	{
		return Route::where('active', '=', 1)->get();
	}

	public function store($data)
	{
		return Route::create($data);
	}

	public function update($data, $id)
	{
		return Route::findOrFail($id)->update($data);
	}

	public function softDelete($id)
	{
		$route = $this->getOne($id);

		$route->active = 0;

		$route->save();
	}

	public function forceDelete($id)
	{
		return Route::destroy($id);
	}
}
