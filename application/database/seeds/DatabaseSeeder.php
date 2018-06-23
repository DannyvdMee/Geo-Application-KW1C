<?php

use App\User\Factory\DepartmentFactory;
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
			true
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
			true
		);

		$teacher->save();

		// Student Segment
		$student = StudentFactory::create(
			111111,
			'TestStudent',
			'TestAdditional',
			true
		);

		$student->save();

		// Route Segment
		$route = RouteFactory::create(
			bin2hex(random_bytes(6)),
			'First Route',
			1,
			true,
			true
		);

		$route->save();

		// Poi Segment
		$poi = PoiFactory::create(
			bin2hex(random_bytes(40)),
			'First POI',
			'51.6903949',
			'5.2866055',
			'Look for the General',
			true,
			1
		);

		$poi->save();

		// Department Segment
		$department = DepartmentFactory::create(
			'ictacademie',
			true
		);

		$department->save();
	}
}
