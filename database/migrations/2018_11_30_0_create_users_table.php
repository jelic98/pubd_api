<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
	
			$table->string('username');
			$table->string('password', 64);
			$table->string('email');
			$table->boolean('is_admin')->default(0);

			$table->softDeletes();
        });
    }

    public function down() {
        Schema::drop('users');
    }
}
