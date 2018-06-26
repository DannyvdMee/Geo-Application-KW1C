<?php
/**
 * Created by PhpStorm.
 * User: Danny
 * Date: 23-Jun-18
 * Time: 13:44
 */

namespace App\User\Factories;

use App\Poi;

class PoiFactory
{
	/**
	 * @param $url_id
	 * @param $title
	 * @param $latitude
	 * @param $longitude
	 * @param $hint
	 * @param $visibility
	 * @param $active
	 *
	 * @return Poi
	 */
	public static function create($url_id, $title, $latitude, $longitude, $hint, $visibility, $active)
	{
		$poi = new Poi();

		$poi->url_id     = $url_id;
		$poi->title      = $title;
		$poi->latitude   = $latitude;
		$poi->longitude  = $longitude;
		$poi->hint       = $hint;
		$poi->visibility = $visibility;
		$poi->active     = $active;

		return $poi;
	}
}