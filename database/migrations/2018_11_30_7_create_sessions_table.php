<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration {

    public function up() {
        Schema::create('sessions', function (Blueprint $table) {
            $table->bigIncrements('id');
			
			$table->string('hash', 32);
			$table->integer('requests');
			$table->boolean('finished');

			$table->dateTime('date_started');
			$table->dateTime('date_finished');
	
			$table->integer('company')->unsigned()->nullable();
			$table->foreign('company')->references('id')->on('companies');

			$table->integer('place')->unsigned()->nullable();
			$table->foreign('place')->references('id')->on('places');
        });
    }

    public function down() {
        Schema::drop('sessions');
    }
}
