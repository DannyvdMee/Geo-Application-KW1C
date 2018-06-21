<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentStudentGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_student_group', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned()->unique();
            $table->integer('group_id')->unsigned()->unique();
			$table->foreign('student_id')->references('id')->on('students');
			$table->foreign('group_id')->references('id')->on('student_groups');
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
        Schema::dropIfExists('student_student_group');
    }
}
