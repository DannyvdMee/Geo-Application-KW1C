<?php

namespace App\Repositories\Poi;

use App\Poi;

class PoiRepository implements PoiInterface
{
	public function getOne($id)
	{
		return Poi::findOrFail($id);
	}

	public function getAllActive()
	{
		return Poi::where('active', '=', 1)->get();
	}

	public function getLatestPoi()
	{
		return Poi::where('active', 1)->orderBy('created_at', 'desc')->first();
	}

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
