<?php

namespace App\Repositories\Poi;

use App\Poi;

class PoiRepository implements PoiInterface
{
	public function store($data)
	{
		return Poi::create($data);
	}

	public function update($data, $id)
	{
		return Poi::findOrFail($id)->update($data);
	}

	public function softDelete($id)
	{
		return Poi::findOrFail($id)->delete();
	}

	public function forceDelete($data)
	{
		// TODO: Implement forceDelete() method.
	}
}
