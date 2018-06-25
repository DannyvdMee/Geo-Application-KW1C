<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pois', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url_id')->unique();
            $table->string('type')->default('individual');
            $table->string('title');
            $table->float('latitude', 8, 6);
            $table->float('longitude',8, 6);
            $table->string('hint')->nullable();
            $table->boolean('visibility')->default(true);
			$table->boolean('active')->default(0);
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
        Schema::dropIfExists('poi');
    }
}
