<?php

use Illuminate\Database\Seeder;
use App\User\Factories\UserFactory;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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

		$user = UserFactory::create(
			'onyilam@hot.com',
			'onyilam',
			'wachtwoord',
			'Onyi',
			'Lam',
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
    }
}
