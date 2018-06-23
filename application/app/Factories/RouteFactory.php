<?php
/**
 * Created by PhpStorm.
 * User: Danny
 * Date: 23-Jun-18
 * Time: 13:44
 */

namespace App\User\Factory;

use App\Route;

class RouteFactory
{
	/**
	 * @param string $name
	 * @param string $additionalInformation
	 * @param boolean $activeState
	 *
	 * @return Route
	 */
	public static function create($title, $user_id, $visibility, $active)
	{
		$route = new Route();

		$route->url_id = bin2hex(random_bytes(6));
		$route->title = $title;
		$route->user_id = $user_id;
		$route->visibility = $visibility;
		$route->active = $active;

		return $route;
	}
}