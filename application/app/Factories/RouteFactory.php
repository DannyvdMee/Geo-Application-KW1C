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
	 * @param string  $title
	 * @param string  $user_id
	 * @param boolean $visibility
	 * @param boolean $active
	 *
	 * @return Route
	 */
	public static function create($url_id, $title, $user_id, $visibility, $active)
	{
		$route = new Route();

		$route->url_id     = $url_id;
		$route->title      = $title;
		$route->user_id    = $user_id;
		$route->visibility = $visibility;
		$route->active     = $active;

		return $route;
	}
}