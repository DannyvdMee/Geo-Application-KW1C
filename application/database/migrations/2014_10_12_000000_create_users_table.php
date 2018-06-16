<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
			$table->string('username')->unique();
            $table->string('password');
            $table->string('firstname', 20);
            $table->string('lastname', 30);
            $table->string('department', 40);
            $table->string('account_type')->default('user');
			$table->boolean('active')->default(false);
            $table->rememberToken();
            $table->timestamps();
			$table->softDeletes();
			$table->index(['firstname', 'lastname'], 'fullname');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
