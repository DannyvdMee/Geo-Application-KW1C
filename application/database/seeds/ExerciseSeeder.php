<?php

use Illuminate\Database\Seeder;
use App\User\Factories\ExerciseFactory;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// Exercise segment
		$exercise = ExerciseFactory::create(
			1,
			'Ghoul Problem at Avans College',
			'Speak to the leader of the settlement.',
			'application/resources/assets/images/Icons/Settlement.png',
			'Preston, go fix your own shit. Im done with those quests',
			1,
			1
		);

		$exercise->save();
    }
}
