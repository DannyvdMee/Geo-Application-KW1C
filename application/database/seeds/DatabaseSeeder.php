<?php

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
		$this->call(UserSeeder::class);
		$this->command->info('Users seeded successfully!');

		$this->call(StudentSeeder::class);
		$this->command->info('Students seeded successfully!');

		$this->call(RouteSeeder::class);
		$this->command->info('Routes seeded successfully!');

		$this->call(PoiSeeder::class);
		$this->command->info('Pois seeded successfully!');

		$this->call(DepartmentSeeder::class);
		$this->command->info('Departments seeded successfully!');

		$this->call(ExerciseSeeder::class);
		$this->command->info('Exercises seeded successfully!');

		$this->command->info('Seeding completed!');
	}
}
