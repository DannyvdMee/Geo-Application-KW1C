<?php

use Illuminate\Database\Seeder;
use App\User\Factories\DepartmentFactory;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$department = DepartmentFactory::create(
			'ictacademie',
			1
		);

		$department->save();
    }
}
