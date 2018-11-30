<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSessions extends Migration {

    public function up() {
        Schema::create('sessions', function (Blueprint $table) {
            $table->bigIncrements('id');
			
			$table->string('hash', 64)->unique();
			$table->integer('requests');
			$table->boolean('finished');
	
			$table->integer('company')->unsigned()->nullable();
			$table->foreign('company')->references('id')->on('companies');

			$table->integer('place')->unsigned()->nullable();
			$table->foreign('place')->references('id')->on('places');
			
			$table->timestamps();
        });
    }

    public function down() {
        Schema::drop('sessions');
    }
}
