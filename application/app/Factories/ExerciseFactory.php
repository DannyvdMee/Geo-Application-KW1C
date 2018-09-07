<?php
/**
 * Created by PhpStorm.
 * User: Danny
 * Date: 23-Jun-18
 * Time: 13:44
 */

namespace App\User\Factories;

use App\Exercise;

class ExerciseFactory
{

	/**
	 * @param $poi_id
	 * @param $name
	 * @param $content
	 * @param $picture
	 * @param $goodAnswer
	 * @param $visibility
	 * @param $active
	 *
	 * @return Exercise
	 */
	public static function create($poi_id, $name, $content, $picture, $goodAnswer, $visibility, $active)
	{
		$exercise = new Exercise();

		$exercise->poi_id     = $poi_id;
		$exercise->name       = $name;
		$exercise->content    = $content;
		$exercise->picture    = $picture;
		$exercise->answer 	  = $goodAnswer;
		$exercise->visibility = $visibility;
		$exercise->active     = $active;

		return $exercise;
	}
}