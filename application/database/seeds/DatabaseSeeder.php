<?php

use App\User\Factories\DepartmentFactory;
use App\User\Factories\ExerciseFactory;
use App\User\Factories\PoiFactory;
use App\User\Factories\RouteFactory;
use App\User\Factories\StudentFactory;
use App\User\Factories\UserFactory;
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
			1
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
			1
		);

		$teacher->save();

		// Student Segment
		$student = StudentFactory::create(
			'TestStudent',
			2115581,
			'TestAdditional',
			1
		);

		$student->save();

		$student = StudentFactory::create(
			'TestStudent 2',
			1243241,
			'Placeholder',
			1
		);

		$student->save();

		// Route Segment
		$route = RouteFactory::create(
			bin2hex(random_bytes(4)),
			'First Route',
			1,
			1,
			1
		);

		$route->save();

		// Poi Segment
		$poi = PoiFactory::create(
			bin2hex(random_bytes(40)),
			'Preson Gravey has a Quest for you!',
			'This is the first POI. But first, another POI needs our help. I will mark it on your map. Find out what they need',
			'individual',
			'51.6903949',
			'5.2866055',
			'Look for a new POI',
			1,
			1
		);

		$poi->save();

		$poi = PoiFactory::create(
			bin2hex(random_bytes(40)),
			'Avans University',
			'Welcome to the Avans HBO',
			'group',
			'51.6886659',
			'5.2869727',
			'University',
			1,
			1
		);

		$poi->save();

		$poi = PoiFactory::create(
			bin2hex(random_bytes(40)),
			'DB Central Station',
			'Welcome to the Central Station',
			'hidden',
			'51.689968',
			'5.295078',
			'Travel',
			1,
			1
		);

		$poi->save();

		// Department Segment
		$department = DepartmentFactory::create(
			'ictacademie',
			1
		);

		$department->save();

		// Exercise segment
		$exercise = ExerciseFactory::create(
			1,
			'Ghoul Problem at Avans College',
			'Speak to the leader of the settlement.',
			'application/resources/assets/images/Icons/Settlement.png',
			'Preston, go fix your own shit. Im done with those quests'
		);

		$exercise->save();
	}
}
