<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoiRouteTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('poi_route',
			function (Blueprint $table) {
				$table->increments('id');
				$table->integer('poi_id')->unsigned();
				$table->integer('route_id')->unsigned();
				$table->foreign('poi_id')->references('id')->on('pois');
				$table->foreign('route_id')->references('id')->on('routes');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('poi_route');
	}
}
