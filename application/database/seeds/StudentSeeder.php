<?php

use Illuminate\Database\Seeder;
use App\User\Factories\StudentFactory;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
