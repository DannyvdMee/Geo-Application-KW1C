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
		Schema::create('exercise',
			function (Blueprint $table) {
				$table->increments('id');
				$table->string('poi_id')->unique();
				$table->string('title');
				$table->string('content');
				$table->string('picture');
				$table->string('goodanswer');
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
