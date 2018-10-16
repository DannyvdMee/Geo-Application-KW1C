<?php

use Illuminate\Database\Seeder;
use App\User\Factories\PoiFactory;

class PoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
