<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students',
			function (Blueprint $table) {
				$table->increments('id');
				$table->integer('number');
				$table->string('name');
                $table->text('information')->nullable();
                $table->boolean('visibility')->default(1);
				$table->boolean('active')->default(0);
				$table->timestamps();
			}
		);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student');
    }
}
