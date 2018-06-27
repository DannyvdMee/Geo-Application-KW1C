<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExerciseTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exercises',
			function (Blueprint $table) {
				$table->increments('id');
				$table->integer('poi_id')->unique()->unsigned();
				$table->string('title');
				$table->string('content');
				$table->string('picture');
				$table->string('answer');
				$table->foreign('poi_id')->references('id')->on('pois');
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
		Schema::dropIfExists('exercise');
	}
}
