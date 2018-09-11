<?php

namespace App\Repositories\Route;

use App\Route;

class RouteRepository implements RouteInterface
{
	public function getOne($id)
	{
		return Route::findOrFail($id);
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
		return Route::findOrFail($id)->delete();
	}

	public function forceDelete($data)
	{
		// TODO: Implement forceDelete() method.
	}
}
