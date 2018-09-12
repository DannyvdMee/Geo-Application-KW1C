<?php

namespace App\Repositories\Poi;

interface PoiInterface
{
	public function getOne($id);

	public function getAllActive();

	public function getLatestPoi();

	public function store($data);

	public function update($data, $id);

	public function softDelete($data);

	public function forceDelete($data);

}