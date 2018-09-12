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

	public function updateVisibility($id)
	{
		$poi = $this->getOne($id);

		if ($poi->visibility == 1) {
			$visibility = 0;
		} else if ($poi->visibility == 0) {
			$visibility = 1;
		}

		$poi->visibility = $visibility;

		$poi->save();
	}

	public function update($data, $id)
	{
		return Poi::findOrFail($id)->update($data);
	}

	public function softDelete($id)
	{
		$poi = $this->getOne($id);

		$poi->active = 0;

		$poi->save();
	}

	public function forceDelete($id)
	{
		return Poi::findOrFail($id)->destroy();
	}
}
