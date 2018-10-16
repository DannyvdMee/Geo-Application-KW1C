<?php

use Illuminate\Database\Seeder;
use App\User\Factories\RouteFactory;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$route = RouteFactory::create(
			bin2hex(random_bytes(4)),
			'First Route',
			1,
			1,
			1
		);

		$route->save();
    }
}
