<?php

namespace App\Repositories\Route;

use App\Route;

class RouteRepository implements RouteInterface
{
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
