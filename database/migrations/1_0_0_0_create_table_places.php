<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePlaces extends Migration {

    public function up() {
        Schema::create('places', function (Blueprint $table) {
            $table->increments('id');
			
			$table->string('name')->unique();
			$table->string('address');
			$table->string('url');
			$table->binary('image');
	
			$table->integer('company')->unsigned()->nullable();
			$table->foreign('company')->references('id')->on('companies');
			
			$table->softDeletes();
			$table->timestamps();
        });
    }

    public function down() {
        Schema::drop('places');
    }
}
