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
	 * @param $title
	 * @param $content
	 * @param $picture
	 * @param $goodAnswer
	 *
	 * @return Exercise
	 */
	public static function create($poi_id, $title, $content, $picture, $goodAnswer)
	{
		$exercise = new Exercise();

		$exercise->poi_id     = $poi_id;
		$exercise->title      = $title;
		$exercise->content    = $content;
		$exercise->picture    = $picture;
		$exercise->goodanswer = $goodAnswer;

		return $exercise;
	}
}