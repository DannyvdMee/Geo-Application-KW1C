<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentGroup', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url_id')->unique();
            $table->string('groupname');
			$table->boolean('visibility')->default(true);
			$table->boolean('active')->default(false);
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
        Schema::dropIfExists('studentGroup');
    }
}
