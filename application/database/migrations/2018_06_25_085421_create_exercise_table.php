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
				$table->string('name');
				$table->string('content');
				$table->string('picture')->nullable();
				$table->string('answer');
				$table->boolean('visibility')->default(1);
				$table->boolean('active')->default(0);
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
