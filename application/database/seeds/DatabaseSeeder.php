<?php

use App\User\Factory\DepartmentFactory;
use App\User\Factory\ExerciseFactory;
use App\User\Factory\PoiFactory;
use App\User\Factory\RouteFactory;
use App\User\Factory\StudentFactory;
use App\User\Factory\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		// Admin Segment
		$user = UserFactory::create(
			'admin@root.local',
			'Admin',
			'Cre@t0rP@sW00rd1',
			'Admin',
			'Root',
			'root',
			'admin',
			0
		);

		$user->save();

		// Teacher Segment
		$teacher = UserFactory::create(
			'teacher@root.local',
			'FirstTeacher',
			'Te@cherP@sW00rd1',
			'First',
			'Teacher',
			'ictacademie',
			'teacher',
			0
		);

		$teacher->save();

		// Student Segment
		$student = StudentFactory::create(
			'TestStudent',
			'2115581',
			'TestAdditional',
			0
		);

		$student->save();

		// Route Segment
		$route = RouteFactory::create(
			bin2hex(random_bytes(4)),
			'First Route',
			1,
			0,
			0
		);

		$route->save();

		// Poi Segment
		$poi = PoiFactory::create(
			bin2hex(random_bytes(40)),
			'Preson Gravey has a Quest for you!',
			'51.6903949',
			'5.2866055',
			'This is the first POI. But first, another POI needs our help. I will mark it on your map. Find out what they need',
			0,
			1
		);

		$poi->save();

		$poi = PoiFactory::create(
			bin2hex(random_bytes(40)),
			'Avans University',
			'51.6886659',
			'5.2869727',
			'University',
			0,
			1
		);

		$poi->save();

		$poi = PoiFactory::create(
			bin2hex(random_bytes(40)),
			'DB Central Station',
			'51.689968',
			'5.295078',
			'Travel',
			0,
			1
		);

		$poi->save();

		// Department Segment
		$department = DepartmentFactory::create(
			'ictacademie',
			0
		);

		$department->save();


		// Exercise segment

		$exercise = ExerciseFactory::create(
			'',
			'Ghoul Problem at Avans College',
			'Speak to the leader of the settlement.',
			'application/resources/assets/images/Icons/Settlement.png',
			'Preston, go fix your own shit. Im done with those quests'
		);

		$exercise->save();

	}
}
